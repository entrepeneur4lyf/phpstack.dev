import React from 'react';
import { Table as MantineTable } from '@mantine/core';

function Table({ wire, mingleData, children }) {
    const {
        data,
        captionSide,
        horizontalSpacing,
        verticalSpacing,
        fontSize,
        striped,
        highlightOnHover,
        withTableBorder,
        withColumnBorders,
        withRowBorders,
        stickyHeader,
        stickyHeaderOffset,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineTable
            data={data}
            captionSide={captionSide}
            horizontalSpacing={horizontalSpacing}
            verticalSpacing={verticalSpacing}
            fontSize={fontSize}
            striped={striped}
            highlightOnHover={highlightOnHover}
            withTableBorder={withTableBorder}
            withColumnBorders={withColumnBorders}
            withRowBorders={withRowBorders}
            stickyHeader={stickyHeader}
            stickyHeaderOffset={stickyHeaderOffset}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineTable>
    );
}

Table.ScrollContainer = function TableScrollContainer({ wire, mingleData, children }) {
    const { minWidth, type } = mingleData;
    return (
        <MantineTable.ScrollContainer minWidth={minWidth} type={type}>
            {children}
        </MantineTable.ScrollContainer>
    );
};

Table.Caption = function TableCaption({ wire, mingleData, children }) {
    return <MantineTable.Caption {...mingleData}>{children}</MantineTable.Caption>;
};

Table.Thead = function TableThead({ wire, mingleData, children }) {
    return <MantineTable.Thead {...mingleData}>{children}</MantineTable.Thead>;
};

Table.Tbody = function TableTbody({ wire, mingleData, children }) {
    return <MantineTable.Tbody {...mingleData}>{children}</MantineTable.Tbody>;
};

Table.Tfoot = function TableTfoot({ wire, mingleData, children }) {
    return <MantineTable.Tfoot {...mingleData}>{children}</MantineTable.Tfoot>;
};

Table.Tr = function TableTr({ wire, mingleData, children }) {
    return <MantineTable.Tr {...mingleData}>{children}</MantineTable.Tr>;
};

Table.Th = function TableTh({ wire, mingleData, children }) {
    return <MantineTable.Th {...mingleData}>{children}</MantineTable.Th>;
};

Table.Td = function TableTd({ wire, mingleData, children }) {
    return <MantineTable.Td {...mingleData}>{children}</MantineTable.Td>;
};

export default Table;
