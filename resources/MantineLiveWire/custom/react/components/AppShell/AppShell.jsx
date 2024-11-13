import React from 'react';
import { AppShell as MantineAppShell } from '@mantine/core';
import { useDisclosure } from '@mantine/hooks';

function AppShell({ wire, mingleData, children }) {
    const [mobileOpened, { toggle: toggleMobile }] = useDisclosure();
    const [desktopOpened, { toggle: toggleDesktop }] = useDisclosure(true);

    const {
        header,
        navbar,
        aside,
        footer,
        padding,
        layout,
        withBorder,
        zIndex,
        transitionDuration,
        transitionTimingFunction,
        disabled,
    } = mingleData;

    // Expose toggle functions to Livewire
    React.useEffect(() => {
        if (wire) {
            wire.toggleMobileNav = toggleMobile;
            wire.toggleDesktopNav = toggleDesktop;
        }
    }, [wire, toggleMobile, toggleDesktop]);

    // Configure navbar collapsed state
    const navbarConfig = navbar ? {
        ...navbar,
        collapsed: {
            mobile: !mobileOpened,
            desktop: !desktopOpened,
        }
    } : undefined;

    return (
        <MantineAppShell
            header={header}
            navbar={navbarConfig}
            aside={aside}
            footer={footer}
            padding={padding}
            layout={layout}
            withBorder={withBorder}
            zIndex={zIndex}
            transitionDuration={transitionDuration}
            transitionTimingFunction={transitionTimingFunction}
            disabled={disabled}
        >
            {children}
        </MantineAppShell>
    );
}

AppShell.Header = function AppShellHeader({ children, ...props }) {
    return (
        <MantineAppShell.Header {...props}>
            {children}
        </MantineAppShell.Header>
    );
};

AppShell.Navbar = function AppShellNavbar({ children, ...props }) {
    return (
        <MantineAppShell.Navbar {...props}>
            {children}
        </MantineAppShell.Navbar>
    );
};

AppShell.Aside = function AppShellAside({ children, ...props }) {
    return (
        <MantineAppShell.Aside {...props}>
            {children}
        </MantineAppShell.Aside>
    );
};

AppShell.Footer = function AppShellFooter({ children, ...props }) {
    return (
        <MantineAppShell.Footer {...props}>
            {children}
        </MantineAppShell.Footer>
    );
};

AppShell.Main = function AppShellMain({ children, ...props }) {
    return (
        <MantineAppShell.Main {...props}>
            {children}
        </MantineAppShell.Main>
    );
};

AppShell.Section = function AppShellSection({ children, ...props }) {
    return (
        <MantineAppShell.Section {...props}>
            {children}
        </MantineAppShell.Section>
    );
};

export default AppShell;
