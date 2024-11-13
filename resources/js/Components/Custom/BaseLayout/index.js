import React from 'react';
import { AppShell, Container, Group } from '@mantine/core';
import MantineProvider from '../../../../MantineLiveWire/custom/react/components/MantineProvider';
import ColorSchemeToggle from '../../../../MantineLiveWire/custom/react/components/ColorSchemeToggle';

function BaseLayout({ wire, mingleData, children }) {
    const {
        appName,
        colorScheme,
        config,
        theme,
    } = mingleData;

    return (
        <MantineProvider
            theme={theme}
            colorScheme={colorScheme}
            config={config}
        >
            <AppShell
                header={{ height: 60 }}
                padding="md"
            >
                <AppShell.Header>
                    <Container size="xl">
                        <Group justify="space-between" h="100%">
                            <div>{appName}</div>
                            <Group>
                                <ColorSchemeToggle
                                    wire={wire}
                                    mingleData={{
                                        colorScheme,
                                        config,
                                        size: 'md',
                                        variant: 'subtle',
                                    }}
                                />
                            </Group>
                        </Group>
                    </Container>
                </AppShell.Header>

                <AppShell.Main>
                    <Container size="xl">
                        {children}
                    </Container>
                </AppShell.Main>
            </AppShell>
        </MantineProvider>
    );
}

export default BaseLayout;
