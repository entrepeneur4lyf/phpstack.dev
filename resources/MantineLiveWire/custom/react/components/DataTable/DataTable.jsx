import React, { useRef } from 'react';
import { Paper, Badge, Text, useMantineTheme } from '@mantine/core';
import { DataTable as MantineDataTable } from 'mantine-datatable';
import { motion, LayoutGroup, AnimatePresence } from 'motion/react';
import * as Renderers from './renderers';
import {
    getRecordId,
    getRowAttributes,
    processColumns,
    processGroups,
    formatPaginationText,
    mergeStyles,
    mergeClassNames,
    processSortStatus,
    useTableAnimation,
    debugAnimation,
} from './utils';
import './styles.layer.css';

// Motion-enhanced table row component
const MotionTableRow = motion.tr;

function DataTable({ wire, mingleData, children }) {
    const theme = useMantineTheme();
    const scrollViewportRef = useRef(null);
    const [animationParent] = useTableAnimation({ animation: mingleData.animation, records: mingleData.records }, wire.config?.features?.animation);
    
    const {
        // Data props
        records,
        columns,
        groups,
        totalRecords,
        recordsPerPage,
        page,
        sortStatus,
        loading,

        // Record identification
        idAccessor = 'id',

        // Default column properties
        defaultColumnProps,
        defaultColumnRender,

        // Row styling props
        rowColor,
        rowBackgroundColor,
        rowClassName,
        rowStyle,

        // Scroll configuration
        height = '100%',
        scrollAreaProps = {},
        infiniteScroll = {},

        // Animation configuration
        animation,

        // Basic table properties
        withRowBorders = true,
        withColumnBorders = false,
        striped = false,
        highlightOnHover = false,
        withTableBorder = true,
        noHeader = false,
        
        // Styling props
        shadow = 'sm',
        horizontalSpacing = 'xs',
        verticalSpacing = 'xs',
        fontSize = 'sm',
        borderRadius = 'sm',
        verticalAlign = 'center',

        // Color properties
        c,
        backgroundColor,
        borderColor,
        rowBorderColor,
        paginationTextColor,
        paginationActiveTextColor,
        paginationActiveBackgroundColor,

        // Selection props
        selectedRecords = [],
        onSelectedRecordsChange,
        isRecordSelectable,
        selectionTrigger,
        selectionCheckboxProps,

        // Row expansion
        rowExpansion,
        
        // Context menu
        contextMenu,
        onContextMenu,

        // Empty state
        noRecordsText = 'No records',
        noRecordsIcon,
        loadingText = 'Loading...',

        // Additional props
        className,
        style,
        classNames,
        styles,
        customRowStyle,
    } = mingleData;

    // Custom row render function to wrap rows with Motion
    const customRowRender = (record, index) => {
        const rowId = getRecordId(record, idAccessor);
        const rowAttributes = getRowAttributes(record, index, {
            rowColor,
            rowBackgroundColor,
            rowClassName,
            rowStyle,
            theme,
            config: wire.config?.features?.animation,
        });

        return (
            <MotionTableRow
                key={rowId}
                layout
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                exit={{ opacity: 0, y: -20 }}
                transition={{ duration: 0.2 }}
                {...rowAttributes}
            >
                {/* Row content will be injected here by MantineDataTable */}
            </MotionTableRow>
        );
    };

    // Event handlers
    const handleSelectionChange = (newSelection) => {
        if (onSelectedRecordsChange) {
            debugAnimation('selection-change', wire.config?.features?.animation);
            wire.emit('selectedRecordsChange', newSelection);
        }
    };

    const handleContextMenu = (event, record) => {
        if (onContextMenu) {
            debugAnimation('context-menu', wire.config?.features?.animation);
            wire.emit('contextMenu', { record, x: event.clientX, y: event.clientY });
        }
    };

    const handleScrollToBottom = () => {
        if (infiniteScroll?.enabled && !loading && records.length < totalRecords) {
            debugAnimation('scroll-bottom', wire.config?.features?.animation);
            wire.emit('loadMore');
        }
    };

    const handleScrollToTop = () => {
        if (infiniteScroll?.enabled && infiniteScroll?.reset?.scrollToTop) {
            debugAnimation('scroll-top', wire.config?.features?.animation);
            wire.emit('resetScroll');
        }
    };

    // Process data
    const processedGroups = processGroups(groups, defaultColumnProps, defaultColumnRender, Renderers, theme);
    const processedColumns = !groups ? processColumns(columns, defaultColumnProps, defaultColumnRender, Renderers, theme) : undefined;

    // Process styles and classes
    const mergedStyles = mergeStyles(style, styles);
    const mergedClassNames = mergeClassNames(className, classNames);

    return (
        <Paper 
            className="wrapper" 
            radius={borderRadius} 
            shadow={shadow}
            withBorder={withTableBorder}
            style={{ height }}
        >
            <LayoutGroup>
                <AnimatePresence mode="popLayout">
                    <MantineDataTable
                        records={records}
                        groups={processedGroups}
                        columns={processedColumns}
                        totalRecords={totalRecords}
                        recordsPerPage={recordsPerPage}
                        page={page}
                        onPageChange={(p) => wire.setPage(p)}
                        sortStatus={sortStatus}
                        onSortStatusChange={(s) => wire.setSortStatus(s)}
                        fetching={loading}
                        
                        // Record identification
                        idAccessor={(record) => getRecordId(record, idAccessor)}
                        
                        // Basic table properties
                        withRowBorders={withRowBorders}
                        withColumnBorders={withColumnBorders}
                        striped={striped}
                        highlightOnHover={highlightOnHover}
                        withTableBorder={withTableBorder}
                        noHeader={noHeader}
                        
                        // Styling props
                        horizontalSpacing={horizontalSpacing}
                        verticalSpacing={verticalSpacing}
                        fontSize={fontSize}
                        verticalAlign={verticalAlign}

                        // Color properties
                        c={c}
                        backgroundColor={backgroundColor}
                        borderColor={borderColor}
                        rowBorderColor={rowBorderColor}
                        paginationTextColor={paginationTextColor}
                        paginationActiveTextColor={paginationActiveTextColor}
                        paginationActiveBackgroundColor={paginationActiveBackgroundColor}
                        
                        // Selection props
                        selectedRecords={selectedRecords}
                        onSelectedRecordsChange={handleSelectionChange}
                        isRecordSelectable={isRecordSelectable}
                        selectionTrigger={selectionTrigger}
                        selectionCheckboxProps={selectionCheckboxProps}

                        // Row expansion
                        rowExpansion={rowExpansion}
                        
                        // Context menu
                        contextMenu={contextMenu}
                        onContextMenu={handleContextMenu}

                        // Empty state
                        noRecordsText={noRecordsText}
                        noRecordsIcon={noRecordsIcon}
                        loadingText={loadingText}

                        // Row styling
                        getRowAttributes={(record, index) => getRowAttributes(record, index, {
                            rowColor,
                            rowBackgroundColor,
                            rowClassName,
                            rowStyle,
                            theme,
                            config: wire.config?.features?.animation,
                        })}

                        // Row customization
                        rowRenderer={customRowRender}

                        // Scroll configuration
                        height={height}
                        scrollAreaProps={{
                            type: 'hover',
                            scrollbarSize: 8,
                            scrollHideDelay: 500,
                            ...scrollAreaProps,
                        }}
                        scrollViewportRef={scrollViewportRef}
                        onScrollToBottom={handleScrollToBottom}
                        onScrollToTop={handleScrollToTop}
                        
                        // Animation configuration
                        bodyRef={animationParent}
                        
                        // Additional configuration
                        loaderBackgroundBlur={infiniteScroll?.loading?.blur ?? 2}
                        className={mergedClassNames.root}
                        style={mergedStyles.root}
                        classNames={{
                            ...mergedClassNames,
                            root: 'table',
                            header: 'header',
                            footer: 'footer',
                            pagination: 'pagination',
                        }}
                        styles={mergedStyles}
                    >
                        {children}
                    </MantineDataTable>
                </AnimatePresence>
            </LayoutGroup>
        </Paper>
    );
}

// Attach renderers to DataTable
Object.assign(DataTable, Renderers);

export default DataTable;
