<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleCodeHighlight extends Component
{
    public function render()
    {
        $basicCode = <<<'CODE'
function Button() {
    return <button>Click me</button>;
}
CODE;

        $tsxCode = <<<'CODE'
import { Group, Button, MantineProvider, createTheme } from '@mantine/core';
import classes from './Demo.module.css';

const theme = createTheme({
    components: {
        Button: Button.extend({
            classNames: classes,
        }),
    },
});

function Demo() {
    return (
        <MantineProvider theme={theme}>
            <Group>
                <Button variant="danger">Danger variant</Button>
                <Button variant="primary">Primary variant</Button>
            </Group>
        </MantineProvider>
    );
}
CODE;

        $cssCode = <<<'CODE'
.root {
    &[data-variant='danger'] {
        background-color: var(--mantine-color-red-9);
        color: var(--mantine-color-red-0);
    }

    &[data-variant='primary'] {
        background: linear-gradient(45deg, #4b6cb7 10%, #253b67 90%);
        color: var(--mantine-color-white);
    }
}
CODE;

        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-code-highlight
                        :code="$basicCode"
                        language="tsx"
                    />
                </div>

                <!-- With custom copy labels -->
                <div class="mt-8">
                    <x-mantine-code-highlight
                        :code="$basicCode"
                        language="tsx"
                        copy-label="Copy button code"
                        copied-label="Copied!"
                    />
                </div>

                <!-- Without copy button -->
                <div class="mt-8">
                    <x-mantine-code-highlight
                        :code="$basicCode"
                        language="tsx"
                        :with-copy-button="false"
                    />
                </div>

                <!-- With expandable code -->
                <div class="mt-8">
                    <x-mantine-code-highlight
                        :code="$tsxCode"
                        language="tsx"
                        :with-expand-button="true"
                        :default-expanded="false"
                        expand-code-label="Show full code"
                        collapse-code-label="Show less"
                    />
                </div>

                <!-- With tabs -->
                <div class="mt-8">
                    <x-mantine-code-highlight-tabs
                        :code="[
                            ['fileName' => 'Demo.tsx', 'code' => $tsxCode, 'language' => 'tsx'],
                            ['fileName' => 'Demo.module.css', 'code' => $cssCode, 'language' => 'scss'],
                        ]"
                    />
                </div>

                <!-- With tabs and icons -->
                <div class="mt-8">
                    <x-mantine-code-highlight-tabs
                        :code="[
                            [
                                'fileName' => 'Demo.tsx',
                                'code' => $tsxCode,
                                'language' => 'tsx',
                                'icon' => '<TypeScriptIcon size=18 />',
                            ],
                            [
                                'fileName' => 'Demo.module.css',
                                'code' => $cssCode,
                                'language' => 'scss',
                                'icon' => '<CssIcon size=18 />',
                            ],
                        ]"
                    />
                </div>

                <!-- Inline code highlight -->
                <div class="mt-8">
                    <x-mantine-text>
                        You can highlight code inline:
                        <x-mantine-inline-code-highlight
                            code='<Button>Click me</Button>'
                            language="tsx"
                        />.
                        Is not that cool?
                    </x-mantine-text>
                </div>
            </div>
        blade;
    }
}
