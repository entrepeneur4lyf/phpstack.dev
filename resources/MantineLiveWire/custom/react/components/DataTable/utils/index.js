export * from './sorting';
export * from './selection';
export * from './row-interaction';
export * from './actions';
export * from './animation';

// Record ID processing
export const getRecordId = (record, idAccessor) => {
    if (typeof idAccessor === 'function') {
        return idAccessor(record);
    }
    if (typeof idAccessor === 'string') {
        return idAccessor.split('.').reduce((obj, key) => obj?.[key], record);
    }
    return record.id;
};

// Row styling processing
export const getRowAttributes = (record, index, { 
    rowColor, 
    rowBackgroundColor, 
    rowClassName, 
    rowStyle, 
    theme,
    config 
}) => {
    const attributes = {};

    // Handle row color
    if (rowColor && typeof rowColor === 'function') {
        const color = rowColor(record, index);
        if (color) {
            attributes.c = color;
        }
    }

    // Handle row background color
    if (rowBackgroundColor && typeof rowBackgroundColor === 'function') {
        const bgColor = rowBackgroundColor(record, index);
        if (bgColor) {
            if (typeof bgColor === 'string') {
                attributes.backgroundColor = bgColor;
            } else if (bgColor.light && bgColor.dark) {
                attributes.backgroundColor = theme.colorScheme === 'dark' ? bgColor.dark : bgColor.light;
            }
        }
    }

    // Handle row class name
    if (rowClassName && typeof rowClassName === 'function') {
        const className = rowClassName(record, index);
        if (className) {
            attributes.className = `${className} ${getAnimationDebugClasses(config)}`.trim();
        } else {
            attributes.className = getAnimationDebugClasses(config);
        }
    } else {
        attributes.className = getAnimationDebugClasses(config);
    }

    // Handle row style
    if (rowStyle && typeof rowStyle === 'function') {
        const style = rowStyle(record, index);
        if (style) {
            attributes.style = {
                ...(typeof style === 'function' ? style(theme) : style),
                ...getAnimationStyles(config),
            };
        } else {
            attributes.style = getAnimationStyles(config);
        }
    } else {
        attributes.style = getAnimationStyles(config);
    }

    // Add interaction styles
    const interactionStyles = getRowInteractionStyles(config, theme);
    if (Object.keys(interactionStyles).length > 0) {
        attributes.style = {
            ...attributes.style,
            ...interactionStyles,
        };
    }

    return attributes;
};

// Process columns with default properties
export const processColumns = (columns, defaultColumnProps, defaultColumnRender, renderers, theme, config) => {
    if (!columns) return undefined;

    // Get action column if enabled
    const actionColumn = getActionColumn(config?.features?.rowActions, {
        onClick: (action, record, event) => {
            if (handleActionConfirmation(action, record, config?.features?.rowActions)) {
                const eventName = config?.features?.rowActions?.events?.[`on${action.charAt(0).toUpperCase() + action.slice(1)}`] || 'row-action-click';
                window.Livewire.dispatch(eventName, { record, action });
            }
        }
    });

    // Add action column if enabled
    const processedColumns = columns.map(column => ({
        ...defaultColumnProps,
        ...column,
        cellsStyle: column.cellsStyle || defaultColumnProps?.cellsStyle,
        titleStyle: column.titleStyle || defaultColumnProps?.titleStyle,
        footerStyle: column.footerStyle || defaultColumnProps?.footerStyle,
        render: processColumnRender(column, defaultColumnRender, renderers),
    }));

    if (actionColumn) {
        processedColumns.push(actionColumn);
    }

    return processedColumns;
};

// Process groups
export const processGroups = (groups, defaultColumnProps, defaultColumnRender, renderers, theme) => {
    if (!groups) return undefined;

    return groups
        .map(group => ({
            ...group,
            columns: group.columns
                ?.filter(column => isColumnVisible(column, theme))
                .map(column => ({
                    ...defaultColumnProps,
                    ...column,
                    cellsStyle: column.cellsStyle || defaultColumnProps?.cellsStyle,
                    titleStyle: column.titleStyle || defaultColumnProps?.titleStyle,
                    footerStyle: column.footerStyle || defaultColumnProps?.footerStyle,
                    render: processColumnRender(column, defaultColumnRender, renderers),
                })),
            style: typeof group.style === 'function' ? group.style(theme) : group.style,
        }))
        .filter(group => group.columns?.length > 0);
};

// Column rendering processing
export const processColumnRender = (column, defaultColumnRender, renderers) => {
    if (column.render) {
        // Use custom renderer if provided
        return typeof column.render === 'string'
            ? (record) => {
                const Renderer = renderers[column.render];
                return Renderer ? <Renderer value={record[column.accessor]} record={record} /> : null;
            }
            : column.render;
    }

    // Use default renderer if provided
    if (defaultColumnRender) {
        return (record, index) => defaultColumnRender(record, index, column.accessor);
    }

    // Fallback to accessing the value directly
    return (record) => {
        const value = column.accessor.split('.').reduce((obj, key) => obj?.[key], record);
        return value ?? '';
    };
};

// Style merging
export const mergeStyles = (style, styles) => ({
    root: typeof style === 'function' ? style : { ...style },
    ...styles,
});

// Class name merging
export const mergeClassNames = (className, classNames) => ({
    root: className,
    ...classNames,
});
