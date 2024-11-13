import React from 'react';
import { Spoiler as MantineSpoiler } from '@mantine/core';

function Spoiler({ wire, mingleData, children }) {
    const {
        maxHeight,
        showLabel,
        hideLabel,
        expanded,
        onExpandedChange,
        transitionDuration,
        controlRef,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineSpoiler
            maxHeight={maxHeight}
            showLabel={showLabel}
            hideLabel={hideLabel}
            expanded={expanded}
            onExpandedChange={onExpandedChange ? (value) => wire.emit('expandedChange', value) : undefined}
            transitionDuration={transitionDuration}
            controlRef={controlRef}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineSpoiler>
    );
}

export default Spoiler;
