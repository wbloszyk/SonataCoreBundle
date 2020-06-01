<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\CoreBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * @deprecated since sonata-project/core-bundle 3.19, to be removed in 4.0.
 */
class TwigCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $this->registerFlashAliases($container);
        $this->registerTwigAliases($container);
        $this->registerSlugifyAliases($container);
        $this->forceUserToMoveConfig($container);
    }

    public function registerFlashAliases(ContainerBuilder $container)
    {
        $flashManagerAlias = $container
            ->setAlias('sonata.core.flashmessage.manager', 'sonata.twig.flashmessage.manager')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $flashRuntimeAlias = $container
            ->setAlias('sonata.core.flashmessage.twig.runtime', 'sonata.twig.flashmessage.twig.runtime')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $flashExtensionAlias = $container
            ->setAlias('sonata.core.flashmessage.twig.extension', 'sonata.twig.flashmessage.twig.extension')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );
    }

    public function registerTwigAliases(ContainerBuilder $container)
    {
        $extensionWrapping = $container
            ->setAlias('sonata.core.twig.extension.wrapping', 'sonata.twig.extension.wrapping')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $runtimeStatus = $container
            ->setAlias('sonata.core.twig.status_extension', 'sonata.twig.status_extension')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.twig.status_extension" instead.'
            );

        $container
            ->setAlias('sonata.core.twig.status_runtime', 'sonata.twig.status_runtime')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $extensionDeprecatedTemplate = $container
            ->setAlias('sonata.core.twig.deprecated_template_extension', 'sonata.twig.deprecated_template_extension')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $extensionTemplate = $container
            ->setAlias('sonata.core.twig.template_extension', 'sonata.twig.template_extension')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );
    }

    public function registerSlugifyAliases(ContainerBuilder $container)
    {
        $container
            ->setAlias('sonata.core.slugify.cocur', 'sonata.twig.slugify.cocur')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.twig.slugify.cocur" instead.'
            );
    }

    public function forceUserToMoveConfig(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');

        if (!isset($bundles['SonataTwigBundle'])) {
            return;
        }

        if (!empty($container->getParameter('sonata.core.flashmessage'))) {
            throw new \Exception('Move bundle config from sonata_core.flashmessage to sonata_twig.flashmessage');
        }
    }
}
