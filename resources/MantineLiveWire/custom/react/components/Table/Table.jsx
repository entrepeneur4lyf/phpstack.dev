import React from 'react';
import { Table as MantineTable } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, interactive, stagger, presets } from '../../utils/animations';

// Motion-enhanced components
const MotionTable = motion(MantineTable);
const MotionTr = motion(MantineTable.Tr);
const MotionTd = motion(MantineTable.Td);
const MotionTh = motion(MantineTable.Th);
const MotionScrollContainer = motion(MantineTable.ScrollContainer);

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
        // Animation props
        animate = true,
    } = mingleData;

    return (
        <MotionTable
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
            styles={{
                ...styles,
                root: {
                    ...styles?.root,
                    overflow: 'hidden',
                },
            }}
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={springs.input}
        >
            {children}
        </MotionTable>
    );
}

Table.ScrollContainer = function TableScrollContainer({ wire, mingleData, children }) {
    const { minWidth, type } = mingleData;
    
    return (
        <MotionScrollContainer
            minWidth={minWidth}
            type={type}
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={springs.input}
        >
            {children}
        </MotionScrollContainer>
    );
};

Table.Caption = function TableCaption({ wire, mingleData, children }) {
    return (
        <motion.caption
            initial={{ opacity: 0, y: -10 }}
            animate={{ opacity: 1, y: 0 }}
            transition={springs.input}
            {...mingleData}
        >
            {children}
        </motion.caption>
    );
};

Table.Thead = function TableThead({ wire, mingleData, children }) {
    return (
        <MantineTable.Thead {...mingleData}>
            <AnimatePresence mode="wait">
                {children}
            </AnimatePresence>
        </MantineTable.Thead>
    );
};

Table.Tbody = function TableTbody({ wire, mingleData, children }) {
    return (
        <MantineTable.Tbody {...mingleData}>
            <motion.div {...stagger.container}>
                {children}
            </motion.div>
        </MantineTable.Tbody>
    );
};

Table.Tfoot = function TableTfoot({ wire, mingleData, children }) {
    return (
        <MantineTable.Tfoot {...mingleData}>
            <AnimatePresence mode="wait">
                {children}
            </AnimatePresence>
        </MantineTable.Tfoot>
    );
};

Table.Tr = function TableTr({ wire, mingleData, children }) {
    return (
        <MotionTr
            {...mingleData}
            {...stagger.item}
            initial={{ opacity: 0, x: -20 }}
            animate={{ opacity: 1, x: 0 }}
            exit={{ opacity: 0, x: 20 }}
            transition={{
                ...springs.input,
                delay: mingleData?.index ? mingleData.index * 0.05 : 0,
            }}
            whileHover={mingleData?.highlightOnHover ? {
                backgroundColor: 'rgba(0, 0, 0, 0.05)',
                transition: {
                    duration: presets.input.duration * 0.3,
                }
            } : undefined}
        >
            {children}
        </MotionTr>
    );
};

Table.Th = function TableTh({ wire, mingleData, children }) {
    const { sorted, sortDirection, ...rest } = mingleData;

    return (
        <MotionTh
            {...rest}
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={springs.input}
            whileHover={sorted ? {
                backgroundColor: 'rgba(0, 0, 0, 0.03)',
                transition: {
                    duration: presets.input.duration * 0.3,
                }
            } : undefined}
        >
            <motion.div
                style={{ display: 'flex', alignItems: 'center', gap: '4px' }}
            >
                {children}
                {sorted && (
                    <motion.div
                        initial={{ rotate: 0 }}
                        animate={{ 
                            rotate: sortDirection === 'asc' ? 0 : 180,
                            opacity: 1,
                        }}
                        transition={springs.input}
                    >
                        ▲
                    </motion.div>
                )}
            </motion.div>
        </MotionTh>
    );
};

Table.Td = function TableTd({ wire, mingleData, children }) {
    return (
        <MotionTd
            {...mingleData}
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={springs.input}
        >
            {children}
        </MotionTd>
    );
};

// Add variants for common use cases
Table.Striped = function StripedTable(props) {
    return (
        <Table
            {...props}
            mingleData={{
                ...props.mingleData,
                striped: true,
                highlightOnHover: true,
            }}
        />
    );
};

Table.Bordered = function BorderedTable(props) {
    return (
        <Table
            {...props}
            mingleData={{
                ...props.mingleData,
                withTableBorder: true,
                withColumnBorders: true,
                withRowBorders: true,
            }}
        />
    );
};

Table.Compact = function CompactTable(props) {
    return (
        <Table
            {...props}
            mingleData={{
                ...props.mingleData,
                fontSize: 'sm',
                horizontalSpacing: 'xs',
                verticalSpacing: 'xs',
            }}
        />
    );
};

export default Table;
