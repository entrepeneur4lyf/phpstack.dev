import React from 'react';
import { Menu as MantineMenu } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { overlayAnimations, springs, interactive, layout, stagger } from '../../utils/animations';

// Motion-enhanced components
const MotionDropdown = motion(MantineMenu.Dropdown);
const MotionItem = motion(MantineMenu.Item);
const MotionLabel = motion(MantineMenu.Label);
const MotionDivider = motion(MantineMenu.Divider);

function Menu({ wire, mingleData, children }) {
    const {
        opened,
        onChange,
        trigger,
        openDelay,
        closeDelay,
        loop,
        closeOnItemClick,
        closeOnEscape,
        position = 'bottom',
        offset,
        withArrow,
        transitionProps,
        width,
        shadow,
        withinPortal,
        trapFocus,
        menuItemTabIndex,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineMenu
            opened={opened}
            onChange={onChange}
            trigger={trigger}
            openDelay={openDelay}
            closeDelay={closeDelay}
            loop={loop}
            closeOnItemClick={closeOnItemClick}
            closeOnEscape={closeOnEscape}
            position={position}
            offset={offset}
            withArrow={withArrow}
            transitionProps={{ duration: 0 }} // Disable Mantine's transitions
            width={width}
            shadow={shadow}
            withinPortal={withinPortal}
            trapFocus={trapFocus}
            menuItemTabIndex={menuItemTabIndex}
            classNames={classNames}
            styles={{
                ...styles,
                dropdown: {
                    ...styles?.dropdown,
                    transition: 'none',
                },
            }}
        >
            {children}
        </MantineMenu>
    );
}

Menu.Target = function MenuTarget({ wire, mingleData, children }) {
    return <MantineMenu.Target>{children}</MantineMenu.Target>;
};

Menu.Dropdown = function MenuDropdown({ wire, mingleData, children }) {
    const { position = 'bottom' } = mingleData;

    return (
        <AnimatePresence mode="wait">
            <MotionDropdown
                {...mingleData}
                {...overlayAnimations.getPositionAnimation(position, 'popover')}
            >
                <motion.div
                    {...stagger.container}
                >
                    {children}
                </motion.div>
            </MotionDropdown>
        </AnimatePresence>
    );
};

Menu.Item = function MenuItem({ wire, mingleData, children }) {
    const { color, disabled, leftSection, rightSection, component } = mingleData;

    return (
        <MotionItem
            color={color}
            disabled={disabled}
            leftSection={leftSection}
            rightSection={rightSection}
            component={component}
            {...stagger.item}
            {...(disabled ? {} : interactive.button)}
        >
            {children}
        </MotionItem>
    );
};

Menu.Label = function MenuLabel({ wire, mingleData, children }) {
    return (
        <MotionLabel
            {...stagger.item}
            initial={{ opacity: 0, y: 5 }}
            animate={{ opacity: 0.6, y: 0 }}
            exit={{ opacity: 0, y: -5 }}
            transition={springs.default}
        >
            {children}
        </MotionLabel>
    );
};

Menu.Divider = function MenuDivider({ wire, mingleData }) {
    return (
        <MotionDivider
            {...stagger.item}
            initial={{ opacity: 0, scaleX: 0 }}
            animate={{ opacity: 1, scaleX: 1 }}
            exit={{ opacity: 0, scaleX: 0 }}
            transition={springs.default}
        />
    );
};

export default Menu;
