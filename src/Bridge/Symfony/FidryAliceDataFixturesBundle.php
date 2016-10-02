<?php

/*
 * This file is part of the Fidry\AliceDataFixtures package.
 *
 * (c) Théo FIDRY <theo.fidry@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fidry\AliceDataFixtures\Bridge\Symfony;

use Fidry\AliceDataFixtures\Bridge\Symfony\DependencyInjection\Compiler\RegisterTagServicesPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
final class FidryAliceDataFixturesBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(
            new RegisterTagServicesPass(
                'fidry_alice_data_fixtures.doctrine.persister_loader',
                'fidry_alice_data_fixtures.processor'
            )
        );
        $container->addCompilerPass(
            new RegisterTagServicesPass(
                'fidry_alice_data_fixtures.eloquent.persister_loader',
                'fidry_alice_data_fixtures.processor'
            )
        );
    }
}
