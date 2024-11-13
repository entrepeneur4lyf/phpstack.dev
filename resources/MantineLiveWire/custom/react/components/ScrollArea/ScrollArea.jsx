import React from 'react';
import { ScrollArea as MantineScrollArea } from '@mantine/core';

function ScrollArea({ wire, mingleData, children }) {
    const {
        type,
        scrollbars,
        offsetScrollbars,
        scrollbarSize,
        scrollHideDelay,
        viewportRef,
        onScrollPositionChange,
        w,
        h,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineScrollArea
            type={type}
            scrollbars={scrollbars}
            offsetScrollbars={offsetScrollbars}
            scrollbarSize={scrollbarSize}
            scrollHideDelay={scrollHideDelay}
            viewportRef={viewportRef}
            onScrollPositionChange={onScrollPositionChange}
            w={w}
            h={h}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineScrollArea>
    );
}

ScrollArea.Autosize = function ScrollAreaAutosize({ wire, mingleData, children }) {
    const {
        type,
        scrollbars,
        offsetScrollbars,
        scrollbarSize,
        scrollHideDelay,
        viewportRef,
        onScrollPositionChange,
        maxHeight,
        mah,
        w,
        maw,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineScrollArea.Autosize
            type={type}
            scrollbars={scrollbars}
            offsetScrollbars={offsetScrollbars}
            scrollbarSize={scrollbarSize}
            scrollHideDelay={scrollHideDelay}
            viewportRef={viewportRef}
            onScrollPositionChange={onScrollPositionChange}
            maxHeight={maxHeight}
            mah={mah}
            w={w}
            maw={maw}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineScrollArea.Autosize>
    );
};

export default ScrollArea;
