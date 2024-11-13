import { IconChevronUp, IconSelector } from '@tabler/icons-react';

// Default sort icons
export const defaultSortIcons = {
    sorted: IconChevronUp,
    unsorted: IconSelector,
};

// Process sort status
export const processSortStatus = (sortStatus, allowMultiple = false) => {
    if (!sortStatus) return null;

    // Handle single sort
    if (!allowMultiple) {
        return {
            columnAccessor: sortStatus.columnAccessor,
            direction: sortStatus.direction,
        };
    }

    // Handle multi-sort (future implementation)
    return Array.isArray(sortStatus) ? sortStatus : [sortStatus];
};

// Get sort direction for column
export const getSortDirection = (column, sortStatus) => {
    if (!sortStatus || !column.sortable) return null;

    // Handle single sort
    if (!Array.isArray(sortStatus)) {
        return column.accessor === sortStatus.columnAccessor ? sortStatus.direction : null;
    }

    // Handle multi-sort (future implementation)
    const columnSort = sortStatus.find(sort => sort.columnAccessor === column.accessor);
    return columnSort ? columnSort.direction : null;
};

// Get sort icon for column
export const getSortIcon = (column, sortStatus, sortIcons = defaultSortIcons) => {
    if (!column.sortable) return null;

    const direction = getSortDirection(column, sortStatus);
    if (!direction) {
        const UnsortedIcon = sortIcons.unsorted;
        return <UnsortedIcon size={14} />;
    }

    const SortedIcon = sortIcons.sorted;
    return (
        <div style={{ transform: direction === 'desc' ? 'rotate(180deg)' : undefined }}>
            <SortedIcon size={14} />
        </div>
    );
};

// Process sort props for column
export const getSortProps = (column, sortStatus, onSort) => {
    if (!column.sortable) return {};

    return {
        onClick: () => {
            const direction = getSortDirection(column, sortStatus);
            onSort({
                columnAccessor: column.accessor,
                direction: direction === 'asc' ? 'desc' : 'asc',
            });
        },
        style: {
            cursor: 'pointer',
            userSelect: 'none',
        },
    };
};
