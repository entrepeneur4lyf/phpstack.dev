import React from 'react';
import { RingProgress as MantineRingProgress } from '@mantine/core';

function RingProgress({ wire, mingleData, children }) {
    const {
        sections,
        label,
        size,
        thickness,
        roundCaps,
        rootColor,
        classNames,
        styles,
    } = mingleData;

    // Process sections to handle events and tooltips
    const processedSections = sections?.map(section => ({
        ...section,
        onMouseEnter: section.onMouseEnter ? 
            () => wire.emit('sectionMouseEnter', section.value) : undefined,
        onMouseLeave: section.onMouseLeave ? 
            () => wire.emit('sectionMouseLeave', section.value) : undefined,
    }));

    return (
        <MantineRingProgress
            sections={processedSections}
            label={label}
            size={size}
            thickness={thickness}
            roundCaps={roundCaps}
            rootColor={rootColor}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineRingProgress>
    );
}

export default RingProgress;
