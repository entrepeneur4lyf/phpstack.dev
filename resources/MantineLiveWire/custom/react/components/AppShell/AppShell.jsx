import React from 'react';
import { AppShell as MantineAppShell } from '@mantine/core';
import { useDisclosure } from '@mantine/hooks';
import { motion, AnimatePresence } from 'motion/react';
import { springs, layout, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionHeader = motion(MantineAppShell.Header);
const MotionNavbar = motion(MantineAppShell.Navbar);
const MotionAside = motion(MantineAppShell.Aside);
const MotionFooter = motion(MantineAppShell.Footer);
const MotionMain = motion(MantineAppShell.Main);
const MotionSection = motion(MantineAppShell.Section);

// Shared animation configurations
const getLayoutAnimations = (direction = 'y') => ({
    layout: true,
    initial: { opacity: 0, [direction]: direction === 'y' ? -20 : direction === 'x' ? -20 : 0 },
    animate: { opacity: 1, [direction]: 0 },
    exit: { opacity: 0, [direction]: direction === 'y' ? 20 : direction === 'x' ? 20 : 0 },
    transition: {
        ...springs.expand,
        opacity: {
            duration: presets.expand.duration,
            ease: presets.expand.ease
        }
    }
});

const contentAnimation = {
    layout: true,
    initial: { opacity: 0 },
    animate: { opacity: 1 },
    exit: { opacity: 0 },
    transition: {
        duration: presets.expand.duration,
        ease: presets.expand.ease
    }
};

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
            transitionDuration={0}
            disabled={disabled}
            styles={(theme) => ({
                root: {
                    transition: 'none',
                },
                main: {
                    transition: 'none',
                },
            })}
        >
            <motion.div {...contentAnimation}>
                {children}
            </motion.div>
        </MantineAppShell>
    );
}

AppShell.Header = function AppShellHeader({ children, ...props }) {
    return (
        <MotionHeader {...props} {...getLayoutAnimations('y')}>
            <motion.div {...contentAnimation}>
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
                {...getLayoutAnimations('x')}
                animate={{ 
                    ...getLayoutAnimations('x').animate,
                    width: collapsed ? props.width?.collapsed : props.width?.default,
                }}
            >
                <motion.div {...contentAnimation}>
                    {children}
                </motion.div>
            </MotionNavbar>
        </AnimatePresence>
    );
};

AppShell.Aside = function AppShellAside({ children, ...props }) {
    return (
        <AnimatePresence mode="wait">
            <MotionAside {...props} {...getLayoutAnimations('x')}>
                <motion.div {...contentAnimation}>
                    {children}
                </motion.div>
            </MotionAside>
        </AnimatePresence>
    );
};

AppShell.Footer = function AppShellFooter({ children, ...props }) {
    return (
        <MotionFooter {...props} {...getLayoutAnimations('y')}>
            <motion.div {...contentAnimation}>
                {children}
            </motion.div>
        </MotionFooter>
    );
};

AppShell.Main = function AppShellMain({ children, ...props }) {
    return (
        <MotionMain {...props} {...contentAnimation}>
            <motion.div
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{
                    ...springs.expand,
                    opacity: {
                        duration: presets.expand.duration,
                        ease: presets.expand.ease
                    }
                }}
            >
                {children}
            </motion.div>
        </MotionMain>
    );
};

AppShell.Section = function AppShellSection({ children, ...props }) {
    return (
        <MotionSection {...props} {...getLayoutAnimations('y')}>
            <motion.div {...contentAnimation}>
                {children}
            </motion.div>
        </MotionSection>
    );
};

export default AppShell;
