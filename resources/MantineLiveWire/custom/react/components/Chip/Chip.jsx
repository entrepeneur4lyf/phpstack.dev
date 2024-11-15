import React from 'react';
import { Chip as MantineChip } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, layout, stagger } from '../../utils/animations';

// Motion-enhanced components
const MotionChip = motion(MantineChip);
const MotionGroup = motion(MantineChip.Group);

function Chip({ wire, mingleData, children }) {
    const {
        color,
        variant,
        size,
        radius,
        checked,
        defaultChecked,
        disabled,
        value,
        icon,
        wrapperProps,
    } = mingleData;

    // Animated icon component
    const AnimatedIcon = icon && (
        <motion.div
            initial={{ scale: 0, rotate: -45 }}
            animate={{ 
                scale: 1,
                rotate: 0,
                opacity: checked ? 1 : 0.7,
            }}
            transition={springs.snappy}
        >
            {icon}
        </motion.div>
    );

    return (
        <MotionChip
            color={color}
            variant={variant}
            size={size}
            radius={radius}
            checked={checked}
            defaultChecked={defaultChecked}
            disabled={disabled}
            value={value}
            icon={AnimatedIcon}
            wrapperProps={{
                ...wrapperProps,
                style: {
                    ...wrapperProps?.style,
                    position: 'relative',
                },
            }}
            onChange={(checked) => wire.emit('change', checked)}
            styles={(theme) => ({
                root: {
                    transition: 'none', // Remove Mantine's transitions
                },
                label: {
                    transition: 'none', // Remove Mantine's transitions
                },
                checkIcon: {
                    transition: 'none', // Remove Mantine's transitions
                },
            })}
            // Motion animations
            layout
            initial={false} // Prevent initial animation
            animate={{
                scale: checked ? 1.05 : 1,
                backgroundColor: checked 
                    ? theme => theme.colors[color || theme.primaryColor][1]
                    : theme => theme.colors.gray[0],
            }}
            transition={springs.snappy}
            {...(!disabled && {
                whileHover: { 
                    scale: checked ? 1.08 : 1.05,
                    backgroundColor: checked
                        ? theme => theme.colors[color || theme.primaryColor][2]
                        : theme => theme.colors.gray[1],
                },
                whileTap: { scale: 0.95 },
            })}
        >
            <motion.div
                initial={false}
                animate={{
                    scale: checked ? 1.05 : 1,
                    fontWeight: checked ? 600 : 400,
                }}
                transition={springs.snappy}
            >
                {children}
            </motion.div>
        </MotionChip>
    );
}

Chip.Group = function ChipGroup({ wire, mingleData, children }) {
    const {
        multiple,
        value,
        defaultValue,
    } = mingleData;

    return (
        <MotionGroup
            multiple={multiple}
            value={value}
            defaultValue={defaultValue}
            onChange={(value) => wire.emit('change', value)}
            {...layout.default}
        >
            <motion.div
                {...stagger.container}
                style={{
                    display: 'flex',
                    flexWrap: 'wrap',
                    gap: '8px',
                }}
            >
                {React.Children.map(children, (child, index) => (
                    <motion.div
                        key={index}
                        {...stagger.item}
                        style={{ display: 'inline-flex' }}
                    >
                        {child}
                    </motion.div>
                ))}
            </motion.div>
        </MotionGroup>
    );
};

export default Chip;
