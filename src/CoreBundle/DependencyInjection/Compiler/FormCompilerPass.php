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
class FormCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $this->registerDateAliases($container);
        $this->registerFormTypeAlias($container);
        $this->registerFormValiatorAlias($container);
        $this->forceUserToMoveConfig($container);
    }

    public function registerDateAliases(ContainerBuilder $container)
    {
        $momentFormatConventerAlias = $container
            ->setAlias('sonata.core.date.moment_format_converter', 'sonata.form.date.moment_format_converter')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );
    }

    public function registerFormTypeAlias(ContainerBuilder $container)
    {
        $arrayTypeAlias = $container
            ->setAlias('sonata.core.form.type.array', 'sonata.form.type.array')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $boolenTypeAlias = $container
            ->setAlias('sonata.core.form.type.boolean', 'sonata.form.type.boolean')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $collectionTypeAlias = $container
            ->setAlias('sonata.core.form.type.collection', 'sonata.form.type.collection')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $dateRangeAlias = $container
            ->setAlias('sonata.core.form.type.date_range', 'sonata.form.type.date_range')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $datetimeRangeAlias = $container
            ->setAlias('sonata.core.form.type.datetime_range', 'sonata.form.type.datetime_range')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $datePickerAlias = $container
            ->setAlias('sonata.core.form.type.date_picker', 'sonata.form.type.date_picker')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $datetimePickerAlias = $container
            ->setAlias('sonata.core.form.type.datetime_picker', 'sonata.form.type.datetime_picker')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $dateRangePickerAlias = $container
            ->setAlias('sonata.core.form.type.date_range_picker', 'sonata.form.type.date_range_picker')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $datetimeRangePickerAlias = $container
            ->setAlias('sonata.core.form.type.datetime_range_picker', 'sonata.form.type.datetime_range_picker')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $equalTypeAlias = $container
            ->setAlias('sonata.core.form.type.equal', 'sonata.form.type.equal')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%service_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "%alias_id%" instead.'
            );

        $container
            ->setAlias('sonata.core.form.type.array_legacy', 'sonata.form.type.array')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.form.type.array" instead.'
            );

        $container
            ->setAlias('sonata.core.form.type.boolean_legacy', 'sonata.form.type.boolean')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.form.type.boolean" instead.'
            );

        $container
            ->setAlias('sonata.core.form.type.collection_legacy', 'sonata.form.type.collection')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.form.type.collection" instead.'
            );

        $container
            ->setAlias('sonata.core.form.type.date_range_legacy', 'sonata.form.type.date_range')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.form.type.date_range" instead.'
            );

        $container
            ->setAlias('sonata.core.form.type.datetime_range_legacy', 'sonata.form.type.datetime_range')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.form.type.datetime_range" instead.'
            );

        $container
            ->setAlias('sonata.core.form.type.date_picker_legacy', 'sonata.form.type.date_picker')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.form.type.date_picker" instead.'
            );

        $container
            ->setAlias('sonata.core.form.type.datetime_picker_legacy', 'sonata.form.type.datetime_picker')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.form.type.datetime_picker" instead.'
            );

        $container
            ->setAlias('sonata.core.form.type.date_range_picker_legacy', 'sonata.form.type.date_range_picker')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.form.type.date_range_picker" instead.'
            );

        $container
            ->setAlias('sonata.core.form.type.datetime_range_picker_legacy', 'sonata.form.type.datetime_range_picker')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.form.type.datetime_range_picker" instead.'
            );

        $container
            ->setAlias('sonata.core.form.type.equal_legacy', 'sonata.form.type.equal')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.form.type.equal" instead.'
            );
    }

    public function registerFormValiatorAlias(ContainerBuilder $container)
    {
        $container
            ->setAlias('sonata.core.validator.inline', 'sonata.form.validator.inline')
            ->setPublic(true)
            ->setDeprecated(
                true,
                'The "%alias_id%" service is deprecated since sonata-project/core-bundle 3.19 and will be removed in 4.0. Use "sonata.form.validator.inline" instead.'
            );
    }

    public function forceUserToMoveConfig(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');

        if (!isset($bundles['SonataFormBundle'])) {
            return;
        }

        $defaultForm = [
                'mapping' => [
                    'enabled' => true,
                    'type' => [],
                    'extension' => [],
                ],
            ];
        $defaultSerializer = [
                'formats' => [
                    0 => 'json',
                    1 => 'xml',
                    2 => 'yml',
                ],
            ];

        if ($container->getParameter('sonata.core.form') !== $defaultForm) {
            throw new \Exception('Move bundle config from sonata_core.form to sonata_form.form');
        }

        if ($container->getParameter('sonata.core.serializer') !== $defaultSerializer) {
            throw new \Exception('Move bundle config from sonata_core.serializer to sonata_form.serializer');
        }
    }
}
