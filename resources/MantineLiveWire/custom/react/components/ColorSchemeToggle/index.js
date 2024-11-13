import React from 'react';
import { ActionIcon, useMantineColorScheme, useComputedColorScheme } from '@mantine/core';
import { IconSun, IconMoon, IconDeviceDesktop } from '@tabler/icons-react';

function ColorSchemeToggle({ wire, mingleData }) {
    const { size, variant, colorScheme, config } = mingleData;
    const computedColorScheme = useComputedColorScheme('light', { getInitialValueInEffect: true });

    // Get the appropriate icon based on the current color scheme
    const getIcon = () => {
        switch (colorScheme) {
            case 'dark':
                return <IconSun size="1.2rem" stroke={1.5} />;
            case 'auto':
                return <IconDeviceDesktop size="1.2rem" stroke={1.5} />;
            default:
                return <IconMoon size="1.2rem" stroke={1.5} />;
        }
    };

    // Get the appropriate aria-label based on the current color scheme
    const getAriaLabel = () => {
        switch (colorScheme) {
            case 'dark':
                return 'Switch to light mode';
            case 'auto':
                return 'Switch to system color scheme';
            default:
                return 'Switch to dark mode';
        }
    };

    return (
        <ActionIcon
            onClick={() => wire.cycleColorScheme()}
            variant={variant}
            size={size}
            aria-label={getAriaLabel()}
            color={colorScheme === 'dark' ? 'yellow' : 'blue'}
        >
            {getIcon()}
        </ActionIcon>
    );
}

export default ColorSchemeToggle;
