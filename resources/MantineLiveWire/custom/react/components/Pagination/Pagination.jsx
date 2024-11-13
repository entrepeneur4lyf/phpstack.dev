import React from 'react';
import { Pagination as MantinePagination } from '@mantine/core';

function Pagination({ wire, mingleData, children }) {
    const {
        total,
        value,
        defaultValue,
        onChange,
        siblings,
        boundaries,
        color,
        size,
        radius,
        withEdges,
        withControls,
        disabled,
        autoContrast,
        getItemProps,
        getControlProps,
        nextIcon,
        previousIcon,
        firstIcon,
        lastIcon,
        dotsIcon,
    } = mingleData;

    return (
        <MantinePagination
            total={total}
            value={value}
            defaultValue={defaultValue}
            onChange={onChange ? (page) => wire.emit('change', page) : undefined}
            siblings={siblings}
            boundaries={boundaries}
            color={color}
            size={size}
            radius={radius}
            withEdges={withEdges}
            withControls={withControls}
            disabled={disabled}
            autoContrast={autoContrast}
            getItemProps={getItemProps}
            getControlProps={getControlProps}
            nextIcon={nextIcon}
            previousIcon={previousIcon}
            firstIcon={firstIcon}
            lastIcon={lastIcon}
            dotsIcon={dotsIcon}
        >
            {children}
        </MantinePagination>
    );
}

// Compound components
Pagination.Root = function PaginationRoot({ wire, mingleData, children }) {
    return (
        <MantinePagination.Root
            {...mingleData}
            onChange={mingleData.onChange ? (page) => wire.emit('change', page) : undefined}
        >
            {children}
        </MantinePagination.Root>
    );
};

Pagination.Items = function PaginationItems({ wire, mingleData, children }) {
    return (
        <MantinePagination.Items {...mingleData}>
            {children}
        </MantinePagination.Items>
    );
};

Pagination.Next = function PaginationNext({ wire, mingleData, children }) {
    return (
        <MantinePagination.Next {...mingleData}>
            {children}
        </MantinePagination.Next>
    );
};

Pagination.Previous = function PaginationPrevious({ wire, mingleData, children }) {
    return (
        <MantinePagination.Previous {...mingleData}>
            {children}
        </MantinePagination.Previous>
    );
};

Pagination.First = function PaginationFirst({ wire, mingleData, children }) {
    return (
        <MantinePagination.First {...mingleData}>
            {children}
        </MantinePagination.First>
    );
};

Pagination.Last = function PaginationLast({ wire, mingleData, children }) {
    return (
        <MantinePagination.Last {...mingleData}>
            {children}
        </MantinePagination.Last>
    );
};

export default Pagination;
