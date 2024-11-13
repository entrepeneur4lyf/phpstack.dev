import React from 'react';
import { Timeline as MantineTimeline } from '@mantine/core';

function Timeline({ wire, mingleData, children }) {
    const {
        active,
        bulletSize,
        lineWidth,
        color,
        align,
        reverseActive,
        radius,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineTimeline
            active={active}
            bulletSize={bulletSize}
            lineWidth={lineWidth}
            color={color}
            align={align}
            reverseActive={reverseActive}
            radius={radius}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineTimeline>
    );
}

Timeline.Item = function TimelineItem({ wire, mingleData, children }) {
    const {
        title,
        bullet,
        lineVariant,
        radius,
    } = mingleData;

    return (
        <MantineTimeline.Item
            title={title}
            bullet={bullet}
            lineVariant={lineVariant}
            radius={radius}
        >
            {children}
        </MantineTimeline.Item>
    );
};

export default Timeline;
