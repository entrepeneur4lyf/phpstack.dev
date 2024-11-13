import React from 'react';
import { MantineProvider as BaseMantineProvider, createTheme } from '@mantine/core';

function MantineProvider({ theme = {}, children, wire, mingleData }) {
    const {
        colorScheme,
        config = {},
        defaultRadius = 'md',
        white = '#ffffff',
        black = '#1a1b1e',
    } = mingleData;

    // Create theme with color scheme and other configurations
    const mergedTheme = createTheme({
        ...theme,
        colorScheme,
        defaultRadius,
        white,
        black,
        colors: {
            ...theme.colors,
            // Default dark colors for better contrast
            dark: [
                '#C9C9C9',
                '#B8B8B8',
                '#828282',
                '#696969',
                '#424242',
                '#3B3B3B',
                '#2E2E2E',
                '#242424',
                '#1F1F1F',
                '#141414',
            ],
        },
        components: {
            ...theme.components,
            Button: {
                defaultProps: {
                    size: 'md',
                },
                styles: (theme) => ({
                    root: {
                        '--button-height': 'var(--mantine-font-size-sm)',
                        '--button-padding-x': theme.spacing.md,
                        '--button-color': 'var(--mantine-color-white)',
                    },
                }),
            },
            TextInput: {
                defaultProps: {
                    size: 'md',
                },
                styles: (theme) => ({
                    input: {
                        '--input-height': theme.spacing.xl,
                        '--input-padding-y': theme.spacing.xs,
                    },
                }),
            },
            Select: {
                defaultProps: {
                    size: 'md',
                },
            },
            Modal: {
                defaultProps: {
                    radius: 'md',
                    shadow: 'md',
                },
                styles: (theme) => ({
                    content: {
                        '--modal-radius': theme.radius.md,
                    },
                }),
            },
            Paper: {
                defaultProps: {
                    radius: 'md',
                    shadow: 'md',
                },
            },
        },
    });

    return (
        <BaseMantineProvider
            theme={mergedTheme}
            defaultColorScheme={config.defaultColorScheme}
            forceColorScheme={config.forcedColorScheme}
            getRootElement={() => {
                try {
                    return typeof document !== 'undefined' ? document.documentElement : undefined;
                } catch (error) {
                    console.warn('Failed to get root element:', error);
                    return undefined;
                }
            }}
            withCssVariables
            withGlobalStyles
            withNormalizeCSS
            cssVariablesSelector=":root"
            deduplicateCssVariables={true}
            classNamesPrefix="mantine"
            getStyleNonce={() => {
                try {
                    return typeof document !== 'undefined' 
                        ? document.querySelector('meta[name="csp-nonce"]')?.content 
                        : undefined;
                } catch (error) {
                    console.warn('Failed to get style nonce:', error);
                    return undefined;
                }
            }}
            cssVariablesResolver={(theme) => ({
                variables: {
                    '--mantine-spacing-xs': theme.spacing.xs,
                    '--mantine-spacing-sm': theme.spacing.sm,
                    '--mantine-spacing-md': theme.spacing.md,
                    '--mantine-spacing-lg': theme.spacing.lg,
                    '--mantine-spacing-xl': theme.spacing.xl,
                    '--mantine-radius-sm': theme.radius.sm,
                    '--mantine-radius-md': theme.radius.md,
                    '--mantine-radius-lg': theme.radius.lg,
                    '--mantine-radius-xl': theme.radius.xl,
                    '--mantine-font-family': theme.fontFamily,
                    '--mantine-font-size-xs': theme.fontSizes.xs,
                    '--mantine-font-size-sm': theme.fontSizes.sm,
                    '--mantine-font-size-md': theme.fontSizes.md,
                    '--mantine-font-size-lg': theme.fontSizes.lg,
                    '--mantine-font-size-xl': theme.fontSizes.xl,
                },
                light: {
                    '--mantine-color-body': theme.white,
                    '--mantine-color-text': theme.black,
                    '--mantine-color-dimmed': theme.colors.gray[6],
                },
                dark: {
                    '--mantine-color-body': theme.black,
                    '--mantine-color-text': theme.white,
                    '--mantine-color-dimmed': theme.colors.dark[2],
                },
            })}
        >
            {children}
        </BaseMantineProvider>
    );
}

export default MantineProvider;
