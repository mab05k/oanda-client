<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Bridge\Symfony\Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration.
 */
class Configuration implements ConfigurationInterface
{
    public const ACCOUNT_NAME = 'name';
    public const ACCOUNTS = 'accounts';
    public const ACCOUNT_ID = 'account_id';
    public const ACCOUNT_SECRET = 'account_secret';
    public const OANDA_HOSTNAME = 'hostname';
    public const OANDA_STREAM_HOSTNAME = 'stream_hostname';
    public const OANDA_PREFIX = 'path_prefix';
    public const OANDA_CLIENT_TIMEOUT = 'oanda_client_timeout';

    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('mab05k_oanda_client');

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode(self::ACCOUNTS)
                    ->requiresAtLeastOneElement()
                    ->useAttributeAsKey(self::ACCOUNT_NAME)
                    ->arrayPrototype()
                        ->children()
                            ->scalarNode(self::ACCOUNT_ID)
                                ->isRequired()
                                ->cannotBeEmpty()
                            ->end()
                            ->scalarNode(self::ACCOUNT_SECRET)
                                ->isRequired()
                                ->cannotBeEmpty()
                            ->end()
                        ->end()
                    ->end()
                ->end()
                ->scalarNode(self::OANDA_HOSTNAME)->defaultValue('https://api-fxpractice.oanda.com')->end()
                ->scalarNode(self::OANDA_STREAM_HOSTNAME)->defaultValue('https://stream-fxpractice.oanda.com')->end()
                ->scalarNode(self::OANDA_PREFIX)->defaultValue('/v3')->end()
                ->scalarNode(self::OANDA_CLIENT_TIMEOUT)->defaultValue(3)->end()
            ->end();

        return $treeBuilder;
    }
}
