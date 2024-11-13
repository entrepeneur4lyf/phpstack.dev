<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleTree extends Component
{
    public $data = [
        [
            'value' => 'src',
            'label' => 'src',
            'children' => [
                [
                    'value' => 'src/components',
                    'label' => 'components',
                    'children' => [
                        ['value' => 'src/components/Button.tsx', 'label' => 'Button.tsx'],
                        ['value' => 'src/components/Input.tsx', 'label' => 'Input.tsx'],
                    ],
                ],
                [
                    'value' => 'src/hooks',
                    'label' => 'hooks',
                    'children' => [
                        ['value' => 'src/hooks/useForm.ts', 'label' => 'useForm.ts'],
                        ['value' => 'src/hooks/useData.ts', 'label' => 'useData.ts'],
                    ],
                ],
            ],
        ],
        ['value' => 'package.json', 'label' => 'package.json'],
        ['value' => 'tsconfig.json', 'label' => 'tsconfig.json'],
    ];

    public function handleNodeToggled($value)
    {
        // Handle node toggle event
        $this->dispatch('notify', [
            'message' => "Node toggled: {$value}",
            'type' => 'info'
        ]);
    }

    public function handleNodeChecked($value)
    {
        // Handle node check event
        $this->dispatch('notify', [
            'message' => "Node checked: {$value}",
            'type' => 'success'
        ]);
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-tree :data="$data" />

                <!-- With custom node rendering -->
                <div class="mt-8">
                    <x-mantine-tree
                        :data="$data"
                        :level-offset="23"
                        :render-node="'({ node, expanded, hasChildren, elementProps }) => (
                            <Group gap={5} {...elementProps}>
                                {hasChildren && (
                                    <i 
                                        class=\"fas fa-chevron-down\" 
                                        style={{ 
                                            width: \"18px\", 
                                            transform: expanded ? \"rotate(180deg)\" : \"rotate(0deg)\"
                                        }}
                                    />
                                )}
                                <span>{node.label}</span>
                            </Group>
                        )'"
                    />
                </div>

                <!-- With checked state -->
                <div class="mt-8">
                    <x-mantine-tree
                        :data="$data"
                        :level-offset="23"
                        :expand-on-click="false"
                        :render-node="'({ node, expanded, hasChildren, elementProps, tree }) => {
                            const checked = tree.isNodeChecked(node.value);
                            const indeterminate = tree.isNodeIndeterminate(node.value);
                            
                            return (
                                <Group gap=\"xs\" {...elementProps}>
                                    <Checkbox.Indicator
                                        checked={checked}
                                        indeterminate={indeterminate}
                                        onClick={() => (!checked ? tree.checkNode(node.value) : tree.uncheckNode(node.value))}
                                    />
                                    
                                    <Group gap={5} onClick={() => tree.toggleExpanded(node.value)}>
                                        <span>{node.label}</span>
                                        
                                        {hasChildren && (
                                            <i 
                                                class=\"fas fa-chevron-down\"
                                                style={{
                                                    width: \"14px\",
                                                    transform: expanded ? \"rotate(180deg)\" : \"rotate(0deg)\"
                                                }}
                                            />
                                        )}
                                    </Group>
                                </Group>
                            );
                        }'"
                    />
                </div>

                <!-- Files tree example -->
                <div class="mt-8">
                    <x-mantine-tree
                        :data="$data"
                        :select-on-click="true"
                        :clear-selection-on-outside-click="true"
                        :render-node="'({ node, expanded, hasChildren, elementProps }) => {
                            const getIcon = () => {
                                if (node.value.endsWith(\"package.json\")) {
                                    return \"fab fa-npm\";
                                }
                                if (node.value.endsWith(\".ts\") || node.value.endsWith(\".tsx\") || node.value.endsWith(\"tsconfig.json\")) {
                                    return \"fab fa-typescript\";
                                }
                                if (hasChildren) {
                                    return expanded ? \"fas fa-folder-open\" : \"fas fa-folder\";
                                }
                                return \"fas fa-file\";
                            };

                            const getIconColor = () => {
                                if (hasChildren) {
                                    return \"var(--mantine-color-yellow-9)\";
                                }
                                return undefined;
                            };

                            return (
                                <Group gap={5} {...elementProps}>
                                    <i 
                                        class={getIcon()} 
                                        style={{ 
                                            width: \"14px\", 
                                            color: getIconColor()
                                        }} 
                                    />
                                    <span>{node.label}</span>
                                </Group>
                            );
                        }'"
                    />
                </div>

                <!-- With expand/collapse controls -->
                <div class="mt-8">
                    <x-mantine-tree
                        :data="$data"
                        :tree="[
                            'expandAllNodes' => true,
                            'collapseAllNodes' => true,
                        ]"
                    />
                    <x-mantine-group mt="md">
                        <x-mantine-button :on-click="'tree.expandAllNodes'">
                            Expand all
                        </x-mantine-button>
                        <x-mantine-button :on-click="'tree.collapseAllNodes'">
                            Collapse all
                        </x-mantine-button>
                    </x-mantine-group>
                </div>
            </div>
        blade;
    }
}
