<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

include __DIR__.'/../vendor/autoload.php';

// Autoload JMS Serializer annotations for testing!
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
