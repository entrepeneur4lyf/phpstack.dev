import React from 'react';
import { AppShell as MantineAppShell } from '@mantine/core';
import { useDisclosure } from '@mantine/hooks';
import { motion, AnimatePresence } from 'motion/react';
import { springs, layout } from '../../utils/animations';

// Motion-enhanced components
const MotionHeader = motion(MantineAppShell.Header);
const MotionNavbar = motion(MantineAppShell.Navbar);
const MotionAside = motion(MantineAppShell.Aside);
const MotionFooter = motion(MantineAppShell.Footer);
const MotionMain = motion(MantineAppShell.Main);
const MotionSection = motion(MantineAppShell.Section);

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
            transitionDuration={0} // Disable Mantine's transitions
            disabled={disabled}
            styles={(theme) => ({
                root: {
                    transition: 'none', // Remove Mantine's transitions
                },
                main: {
                    transition: 'none',
                },
            })}
        >
            <motion.div
                layout
                transition={springs.default}
            >
                {children}
            </motion.div>
        </MantineAppShell>
    );
}

AppShell.Header = function AppShellHeader({ children, ...props }) {
    return (
        <MotionHeader
            {...props}
            initial={{ y: -20, opacity: 0 }}
            animate={{ y: 0, opacity: 1 }}
            transition={springs.default}
        >
            <motion.div layout transition={springs.default}>
                {children}
            </motion.div>
        </MotionHeader>
    );
};

AppShell.Navbar = function AppShellNavbar({ children, collapsed, ...props }) {
    return (
        <AnimatePresence mode="wait">
            <MotionNavbar
                {...props}
                initial={{ x: -20, opacity: 0 }}
                animate={{ 
                    x: 0,
                    opacity: 1,
                    width: collapsed ? props.width?.collapsed : props.width?.default,
                }}
                exit={{ x: -20, opacity: 0 }}
                transition={springs.default}
            >
                <motion.div
                    layout
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    transition={{ duration: 0.2 }}
                >
                    {children}
                </motion.div>
            </MotionNavbar>
        </AnimatePresence>
    );
};

AppShell.Aside = function AppShellAside({ children, ...props }) {
    return (
        <AnimatePresence mode="wait">
            <MotionAside
                {...props}
                initial={{ x: 20, opacity: 0 }}
                animate={{ x: 0, opacity: 1 }}
                exit={{ x: 20, opacity: 0 }}
                transition={springs.default}
            >
                <motion.div
                    layout
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    transition={{ duration: 0.2 }}
                >
                    {children}
                </motion.div>
            </MotionAside>
        </AnimatePresence>
    );
};

AppShell.Footer = function AppShellFooter({ children, ...props }) {
    return (
        <MotionFooter
            {...props}
            initial={{ y: 20, opacity: 0 }}
            animate={{ y: 0, opacity: 1 }}
            transition={springs.default}
        >
            <motion.div layout transition={springs.default}>
                {children}
            </motion.div>
        </MotionFooter>
    );
};

AppShell.Main = function AppShellMain({ children, ...props }) {
    return (
        <MotionMain
            {...props}
            layout
            transition={springs.default}
        >
            <motion.div
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.3 }}
            >
                {children}
            </motion.div>
        </MotionMain>
    );
};

AppShell.Section = function AppShellSection({ children, ...props }) {
    return (
        <MotionSection
            {...props}
            layout
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: -20 }}
            transition={springs.default}
        >
            <motion.div layout transition={springs.default}>
                {children}
            </motion.div>
        </MotionSection>
    );
};

export default AppShell;
