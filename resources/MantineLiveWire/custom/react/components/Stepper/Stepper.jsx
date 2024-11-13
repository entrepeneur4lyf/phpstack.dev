import React from 'react';
import { Stepper as MantineStepper } from '@mantine/core';

function Stepper({ wire, mingleData, children }) {
    const {
        active,
        color,
        radius,
        size,
        iconSize,
        orientation,
        iconPosition,
        completedIcon,
        allowNextStepsSelect,
        onStepClick,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineStepper
            active={active}
            color={color}
            radius={radius}
            size={size}
            iconSize={iconSize}
            orientation={orientation}
            iconPosition={iconPosition}
            completedIcon={completedIcon}
            allowNextStepsSelect={allowNextStepsSelect}
            onStepClick={onStepClick ? (step) => wire.emit('stepClick', step) : undefined}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineStepper>
    );
}

Stepper.Step = function StepperStep({ wire, mingleData, children }) {
    const {
        label,
        description,
        icon,
        completedIcon,
        loading,
        allowStepSelect,
        allowStepClick,
        color,
        iconSize,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <MantineStepper.Step
            label={label}
            description={description}
            icon={icon}
            completedIcon={completedIcon}
            loading={loading}
            allowStepSelect={allowStepSelect}
            allowStepClick={allowStepClick}
            color={color}
            iconSize={iconSize}
            aria-label={ariaLabel}
        >
            {children}
        </MantineStepper.Step>
    );
};

Stepper.Completed = function StepperCompleted({ children }) {
    return <MantineStepper.Completed>{children}</MantineStepper.Completed>;
};

export default Stepper;
