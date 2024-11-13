// Get selected records
export const getSelectedRecords = (records, selectedIds, idAccessor) => {
    return records.filter(record => 
        selectedIds.includes(
            typeof idAccessor === 'function' 
                ? idAccessor(record) 
                : record[idAccessor]
        )
    );
};

// Get selectable records
export const getSelectableRecords = (records, isRecordSelectable, idAccessor) => {
    if (!isRecordSelectable) return records;
    
    return records.filter(record => isRecordSelectable(record));
};

// Handle shift selection
export const handleShiftSelection = (
    records,
    selectedIds,
    lastSelectedId,
    currentId,
    idAccessor,
    isRecordSelectable
) => {
    const selectableRecords = getSelectableRecords(records, isRecordSelectable, idAccessor);
    const lastSelectedIndex = selectableRecords.findIndex(record => 
        (typeof idAccessor === 'function' ? idAccessor(record) : record[idAccessor]) === lastSelectedId
    );
    const currentIndex = selectableRecords.findIndex(record => 
        (typeof idAccessor === 'function' ? idAccessor(record) : record[idAccessor]) === currentId
    );

    if (lastSelectedIndex === -1 || currentIndex === -1) return selectedIds;

    const [start, end] = [lastSelectedIndex, currentIndex].sort((a, b) => a - b);
    const recordsToSelect = selectableRecords.slice(start, end + 1);
    
    const newSelectedIds = [...selectedIds];
    recordsToSelect.forEach(record => {
        const id = typeof idAccessor === 'function' ? idAccessor(record) : record[idAccessor];
        if (!newSelectedIds.includes(id)) {
            newSelectedIds.push(id);
        }
    });

    return newSelectedIds;
};

// Handle single selection
export const handleSingleSelection = (
    selectedIds,
    recordId,
    maxSelectable = null,
    minSelectable = null
) => {
    const isSelected = selectedIds.includes(recordId);
    let newSelectedIds;

    if (isSelected) {
        // Handle deselection
        if (minSelectable !== null && selectedIds.length <= minSelectable) {
            return selectedIds;
        }
        newSelectedIds = selectedIds.filter(id => id !== recordId);
    } else {
        // Handle selection
        if (maxSelectable !== null && selectedIds.length >= maxSelectable) {
            return selectedIds;
        }
        newSelectedIds = [...selectedIds, recordId];
    }

    return newSelectedIds;
};

// Handle all records selection
export const handleAllRecordsSelection = (
    records,
    selectedIds,
    unselectedIds,
    allSelected,
    idAccessor,
    isRecordSelectable,
    config
) => {
    const selectableRecords = getSelectableRecords(records, isRecordSelectable, idAccessor);
    
    if (allSelected) {
        // If tracking unselected records
        if (config.behavior?.unselect?.trackUnselected) {
            return {
                selectedIds: [],
                unselectedIds: [],
                allSelected: false
            };
        }
        // Regular mode
        return {
            selectedIds: [],
            unselectedIds: [],
            allSelected: false
        };
    } else {
        // If tracking unselected records
        if (config.behavior?.unselect?.trackUnselected) {
            return {
                selectedIds: [],
                unselectedIds: [],
                allSelected: true
            };
        }
        // Regular mode
        const newSelectedIds = selectableRecords.map(record => 
            typeof idAccessor === 'function' ? idAccessor(record) : record[idAccessor]
        );
        return {
            selectedIds: newSelectedIds,
            unselectedIds: [],
            allSelected: false
        };
    }
};

// Get selection column props
export const getSelectionColumnProps = (config) => {
    const { column = {}, checkbox = {} } = config;

    return {
        width: column.width || 0,
        className: column.className,
        style: {
            ...column.style,
            position: column.fixed ? 'sticky' : 'relative',
            left: column.fixed ? 0 : 'auto',
            zIndex: column.fixed ? 2 : 'auto',
        },
        checkboxProps: {
            ...checkbox.props,
            size: checkbox.props?.size || 'sm',
            color: checkbox.props?.color || 'blue',
            radius: checkbox.props?.radius || 'sm',
        },
    };
};

// Get checkbox props for a record
export const getRecordCheckboxProps = (record, config) => {
    const { checkbox = {} } = config;
    const { record: recordConfig = {} } = checkbox;

    return {
        ...checkbox.props,
        title: typeof recordConfig.title === 'function' 
            ? recordConfig.title(record) 
            : recordConfig.title,
        'aria-label': typeof recordConfig.ariaLabel === 'function'
            ? recordConfig.ariaLabel(record)
            : recordConfig.ariaLabel,
    };
};

// Get all records checkbox props
export const getAllRecordsCheckboxProps = (config, totalRecords, selectedCount, allSelected, hasUnselected) => {
    const { checkbox = {} } = config;
    const { allRecords = {} } = checkbox;

    return {
        ...checkbox.props,
        indeterminate: allSelected ? hasUnselected : (selectedCount > 0 && selectedCount < totalRecords),
        checked: allSelected || (!hasUnselected && selectedCount === totalRecords),
        title: allSelected 
            ? 'Unselect all records' 
            : `Select ${totalRecords} records`,
        'aria-label': allRecords.ariaLabel,
    };
};

// Handle selection persistence
export const persistSelection = (tableId, selection, config) => {
    if (!config.persistence?.enabled) return;

    const key = `${config.persistence.keyPrefix}${tableId}`;
    const data = JSON.stringify({
        selectedIds: selection.selectedIds,
        unselectedIds: selection.unselectedIds,
        allSelected: selection.allSelected,
        timestamp: Date.now(),
    });

    if (config.persistence.driver === 'local') {
        localStorage.setItem(key, data);
    } else {
        sessionStorage.setItem(key, data);
    }
};

// Load persisted selection
export const loadPersistedSelection = (tableId, config) => {
    if (!config.persistence?.enabled) return null;

    const key = `${config.persistence.keyPrefix}${tableId}`;
    const data = config.persistence.driver === 'local'
        ? localStorage.getItem(key)
        : sessionStorage.getItem(key);

    if (!data) return null;

    try {
        const parsed = JSON.parse(data);
        const now = Date.now();
        const expirationMs = config.persistence.expiration * 60 * 1000;

        // Check if data is expired
        if (now - parsed.timestamp > expirationMs) {
            if (config.persistence.driver === 'local') {
                localStorage.removeItem(key);
            } else {
                sessionStorage.removeItem(key);
            }
            return null;
        }

        return {
            selectedIds: parsed.selectedIds || [],
            unselectedIds: parsed.unselectedIds || [],
            allSelected: parsed.allSelected || false,
        };
    } catch {
        return null;
    }
};
