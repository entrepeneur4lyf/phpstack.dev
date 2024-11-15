import React, { useRef, useCallback } from 'react';
import { Paper, Badge, Text, useMantineTheme } from '@mantine/core';
import { DataTable as MantineDataTable } from 'mantine-datatable';
import { motion, AnimatePresence, useScroll, useSpring, LayoutGroup } from 'motion/react';
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
} from './utils';
import {
    getRowAnimation,
    getCellAnimation,
    getContainerAnimation,
    getCheckboxAnimation,
    getHeaderAnimation,
    getExpansionAnimation,
    layoutConfig,
    rowVariants
} from './utils/animation';
import './styles.layer.css';

// Motion-enhanced components
const MotionTableRow = motion.tr;
const MotionTableCell = motion.td;
const MotionTableHeader = motion.th;
const MotionCheckbox = motion.div;
const MotionExpansion = motion.div;

function DataTable({ wire, mingleData, children }) {
    const theme = useMantineTheme();
    const scrollViewportRef = useRef(null);
    const containerRef = useRef(null);
    
    // Scroll-linked animations for header
    const { scrollYProgress } = useScroll({
        target: containerRef,
        offset: ["start start", "end start"]
    });

    const headerOpacity = useSpring(scrollYProgress, {
        stiffness: 300,
        damping: 30
    });

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

    // Animation lifecycle handlers
    const handleAnimationStart = useCallback((definition) => {
        console.log('Animation started:', definition);
    }, []);

    const handleAnimationComplete = useCallback((definition) => {
        console.log('Animation completed:', definition);
    }, []);

    // Exit animation complete handler
    const handleExitComplete = useCallback(() => {
        console.log('All exit animations completed');
    }, []);

    // Custom row render function with enhanced Motion animations
    const customRowRender = (record, index) => {
        const rowId = getRecordId(record, idAccessor);
        const rowAttributes = getRowAttributes(record, index, {
            rowColor,
            rowBackgroundColor,
            rowClassName,
            rowStyle,
            theme,
        });

        const isSelected = selectedRecords?.includes(record);
        const rowAnimation = getRowAnimation(index, isSelected ? 'select' : sortStatus ? 'sort' : 'default');

        return (
            <MotionTableRow
                key={rowId}
                custom={index} // For stagger animations
                variants={rowVariants}
                onAnimationStart={handleAnimationStart}
                onAnimationComplete={handleAnimationComplete}
                {...rowAnimation}
                {...rowAttributes}
                {...layoutConfig}
            >
                {/* Row content will be injected here by MantineDataTable */}
            </MotionTableRow>
        );
    };

    // Custom cell render function with animations
    const customCellRender = (cell, index) => (
        <MotionTableCell
            {...getCellAnimation(cell.isUpdated ? 'update' : 'default')}
            {...layoutConfig}
        >
            {cell.content}
        </MotionTableCell>
    );

    // Custom header render function with animations
    const customHeaderRender = (header) => (
        <MotionTableHeader
            style={{ opacity: headerOpacity }}
            {...getHeaderAnimation(header.sorted)}
            {...layoutConfig}
        >
            {header.content}
        </MotionTableHeader>
    );

    // Custom checkbox render function with animations
    const customCheckboxRender = (props) => (
        <MotionCheckbox 
            {...getCheckboxAnimation(props.checked)}
            {...layoutConfig}
        >
            {props.children}
        </MotionCheckbox>
    );

    // Custom expansion render function with animations
    const customExpansionRender = (props) => (
        <MotionExpansion 
            {...getExpansionAnimation()}
            {...layoutConfig}
        >
            {props.children}
        </MotionExpansion>
    );

    // Event handlers
    const handleSelectionChange = (newSelection) => {
        if (onSelectedRecordsChange) {
            wire.emit('selectedRecordsChange', newSelection);
        }
    };

    const handleContextMenu = (event, record) => {
        if (onContextMenu) {
            wire.emit('contextMenu', { record, x: event.clientX, y: event.clientY });
        }
    };

    const handleScrollToBottom = () => {
        if (infiniteScroll?.enabled && !loading && records.length < totalRecords) {
            wire.emit('loadMore');
        }
    };

    const handleScrollToTop = () => {
        if (infiniteScroll?.enabled && infiniteScroll?.reset?.scrollToTop) {
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
            ref={containerRef}
        >
            <LayoutGroup>
                <AnimatePresence 
                    mode="popLayout"
                    onExitComplete={handleExitComplete}
                    initial={false}
                >
                    <motion.div
                        {...layoutConfig}
                        {...getContainerAnimation(sortStatus ? 'sort' : 'default')}
                        onAnimationStart={handleAnimationStart}
                        onAnimationComplete={handleAnimationComplete}
                    >
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
                            
                            // Custom renderers
                            rowRenderer={customRowRender}
                            cellRenderer={customCellRender}
                            headerRenderer={customHeaderRender}
                            checkboxRenderer={customCheckboxRender}
                            expansionRenderer={customExpansionRender}
                            
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

                            // Empty state
                            noRecordsText={noRecordsText}
                            noRecordsIcon={noRecordsIcon}
                            loadingText={loadingText}

                            // Scroll configuration
                            height={height}
                            scrollAreaProps={{
                                type: 'hover',
                                scrollbarSize: 8,
                                scrollHideDelay: 500,
                                ...scrollAreaProps,
                                style: {
                                    ...scrollAreaProps?.style,
                                    // Enable proper layout animations in scrollable container
                                    position: 'relative',
                                    overflow: 'auto'
                                }
                            }}
                            scrollViewportRef={scrollViewportRef}
                            onScrollToBottom={handleScrollToBottom}
                            onScrollToTop={handleScrollToTop}
                            
                            // Additional configuration
                            loaderBackgroundBlur={infiniteScroll?.loading?.blur ?? 2}
                            className={mergedClassNames.root}
                            style={{
                                ...mergedStyles.root,
                                // Enable proper scale correction
                                transform: 'none',
                                willChange: 'transform'
                            }}
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
                    </motion.div>
                </AnimatePresence>
            </LayoutGroup>
        </Paper>
    );
}

// Attach renderers to DataTable
Object.assign(DataTable, Renderers);

export default DataTable;
