<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Bridge\Symfony\Bundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class Mab05kOandaClientExtension.
 */
class Mab05kOandaClientExtension extends Extension implements PrependExtensionInterface
{
    public function prepend(ContainerBuilder $container)
    {
        $configs = $container->getExtensionConfig($this->getAlias());
        $config = $this->processConfiguration(new Configuration(), $configs);

        $this->prependHttplugExtension($container, $config);
    }

    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     *
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yaml');
        $loader->load('client.yaml');
        $loader->load('serializer.yaml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $this->configureAccountDiscriminator($container, $config);
    }

    /**
     * @param ContainerBuilder $container
     * @param array            $config
     */
    private function configureAccountDiscriminator(ContainerBuilder $container, array $config)
    {
        $accounts = [];

        foreach ($config[Configuration::ACCOUNTS] as $name => $account) {
            $accounts[$name] = [
                Configuration::ACCOUNT_NAME => $name,
                Configuration::ACCOUNT_ID => $account[Configuration::ACCOUNT_ID],
                Configuration::ACCOUNT_SECRET => $account[Configuration::ACCOUNT_SECRET],
            ];
        }

        $accountDiscriminator = $container->getDefinition('mab05k.oanda_client.account.account_discriminator');
        $accountDiscriminator->replaceArgument('$accounts', $accounts);
    }

    /**
     * @param ContainerBuilder $container
     * @param array            $config
     */
    private function prependHttplugExtension(ContainerBuilder $container, array $config)
    {
        $plugins = [];
        $plugins[] = $this->hostPlugin($config, Configuration::OANDA_HOSTNAME);
        $plugins[] = $this->pathPlugin($config);
        $plugins[] = $this->headerPlugin();
        $plugins[] = $this->loggerPlugin();

        $streamPlugins = [];
        $streamPlugins[] = $this->hostPlugin($config, Configuration::OANDA_STREAM_HOSTNAME);
        $streamPlugins[] = $this->pathPlugin($config);
        $streamPlugins[] = $this->headerPlugin();
        $streamPlugins[] = $this->loggerPlugin();

        $container->prependExtensionConfig('httplug', [
            'plugins' => [
                'logger' => [
                    'logger' => 'logger',
                ],
            ],
            'clients' => [
                'mab05k_oanda_client' => [
                    'factory' => 'httplug.factory.guzzle6',
                    'config' => [
                        'timeout' => $config[Configuration::OANDA_CLIENT_TIMEOUT],
                    ],
                    'plugins' => $plugins,
                ],
                'mab05k_oanda_stream_client' => [
                    'factory' => 'httplug.factory.guzzle6',
                    'config' => [
                        'timeout' => $config[Configuration::OANDA_CLIENT_TIMEOUT],
                    ],
                    'plugins' => $streamPlugins,
                ],
            ],
        ]);
    }

    /**
     * @param array  $config
     * @param string $host
     *
     * @return array
     */
    private function hostPlugin(array $config, string $host)
    {
        return ['add_host' => [
            'host' => $config[$host],
            'replace' => true,
        ]];
    }

    /**
     * @param array $config
     *
     * @return array
     */
    private function pathPlugin(array $config): array
    {
        return [
            'add_path' => [
                'path' => $config[Configuration::OANDA_PREFIX],
            ],
        ];
    }

    /**
     * @return array
     */
    private function headerPlugin(): array
    {
        return [
            'header_defaults' => [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    private function loggerPlugin(): array
    {
        return [
            'logger' => [
                'logger' => 'logger',
            ],
        ];
    }
}
