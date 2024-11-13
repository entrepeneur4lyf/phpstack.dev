import React from 'react';
import { Transition as MantineTransition } from '@mantine/core';

function Transition({ wire, mingleData, children }) {
    const {
        mounted,
        transition,
        duration,
        timingFunction,
        enterDelay,
        exitDelay,
        keepMounted,
        onEnter,
        onExit,
        onEntered,
        onExited,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineTransition
            mounted={mounted}
            transition={transition}
            duration={duration}
            timingFunction={timingFunction}
            enterDelay={enterDelay}
            exitDelay={exitDelay}
            keepMounted={keepMounted}
            onEnter={onEnter}
            onExit={onExit}
            onEntered={onEntered}
            onExited={onExited}
            classNames={classNames}
            styles={styles}
        >
            {(styles) => React.cloneElement(children, { style: { ...children.props?.style, ...styles } })}
        </MantineTransition>
    );
}

export default Transition;
