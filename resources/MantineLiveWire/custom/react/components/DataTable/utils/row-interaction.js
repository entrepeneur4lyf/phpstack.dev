// Check if click should be prevented
export const shouldPreventClick = (event, preventClickOnElements) => {
    if (!preventClickOnElements) return false;

    // Get the clicked element
    const target = event.target;

    // Check if the clicked element or any of its parents match the prevented elements
    return preventClickOnElements.some(selector => {
        if (typeof selector === 'string') {
            // Handle element types (e.g., 'button', 'a')
            if (!selector.startsWith('.')) {
                return target.tagName.toLowerCase() === selector.toLowerCase();
            }
            // Handle class selectors (e.g., '.no-click')
            return target.closest(selector) !== null;
        }
        return false;
    });
};

// Handle row click
export const handleRowClick = (event, record, config, handlers) => {
    const { click = {} } = config;
    
    // Check if click handling is enabled
    if (!click.enabled) return;

    // Check if click should be prevented
    if (shouldPreventClick(event, click.behavior?.preventClickOnElements)) {
        return;
    }

    // Handle click based on trigger type
    if (click.behavior?.trigger === 'cell' && event.target.tagName.toLowerCase() !== 'td') {
        return;
    }

    // Handle the click
    if (handlers.onClick) {
        handlers.onClick(record, event);
    }
};

// Handle row double click with debouncing
let clickTimeout = null;
export const handleRowDoubleClick = (event, record, config, handlers) => {
    const { click = {} } = config;
    
    // Check if double click handling is enabled
    if (!click.enabled || !click.behavior?.handleDoubleClick) return;

    // Check if click should be prevented
    if (shouldPreventClick(event, click.behavior?.preventClickOnElements)) {
        return;
    }

    // Clear any existing click timeout
    if (clickTimeout) {
        clearTimeout(clickTimeout);
        clickTimeout = null;
        
        // Handle double click
        if (handlers.onDoubleClick) {
            handlers.onDoubleClick(record, event);
        }
    } else {
        // Set timeout for potential second click
        clickTimeout = setTimeout(() => {
            clickTimeout = null;
            // Handle single click after delay
            if (handlers.onClick) {
                handlers.onClick(record, event);
            }
        }, click.behavior?.doubleClickDelay || 300);
    }
};

// Handle context menu
export const handleContextMenu = (event, record, config, handlers) => {
    const { contextMenu = {} } = config;
    
    // Check if context menu is enabled
    if (!contextMenu.enabled) return;

    // Prevent default context menu
    event.preventDefault();

    // Calculate position
    const position = calculateContextMenuPosition(event, contextMenu.position);

    // Handle context menu
    if (handlers.onContextMenu) {
        handlers.onContextMenu(record, position, event);
    }
};

// Calculate context menu position
const calculateContextMenuPosition = (event, positionConfig = {}) => {
    const { fixed = true, offset = { x: 0, y: 0 } } = positionConfig;

    if (fixed) {
        return {
            x: event.clientX + (offset.x || 0),
            y: event.clientY + (offset.y || 0),
        };
    }

    return {
        x: event.pageX + (offset.x || 0),
        y: event.pageY + (offset.y || 0),
    };
};

// Get row interaction styles
export const getRowInteractionStyles = (config, theme) => {
    const { click = {}, hover = {} } = config;
    const styles = {};

    // Add hover styles
    if (hover.enabled) {
        const hoverBgColor = hover.style?.backgroundColor?.[theme.colorScheme] || 
            (theme.colorScheme === 'dark' ? '#2c2e33' : '#f8f9fa');

        styles['&:hover'] = {
            backgroundColor: hoverBgColor,
            transition: hover.style?.transition || 'background-color 0.2s',
        };
    }

    // Add click styles if enabled
    if (click.enabled) {
        styles.cursor = click.style?.hover?.cursor || 'pointer';
        
        if (click.style?.clickedRow) {
            const clickedBgColor = click.style.clickedRow.backgroundColor?.[theme.colorScheme] ||
                (theme.colorScheme === 'dark' ? '#25262b' : '#f1f3f5');

            styles['&:active'] = {
                backgroundColor: clickedBgColor,
                transition: click.style.clickedRow.transition || 'background-color 0.2s',
            };
        }
    }

    return styles;
};
