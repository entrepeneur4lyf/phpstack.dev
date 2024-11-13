import { ActionIcon, Group, Tooltip } from '@mantine/core';
import { 
    IconEye, 
    IconEdit, 
    IconTrash,
    IconDotsVertical,
    IconCheck,
    IconX,
    IconCopy,
    IconDownload,
    IconPrinter,
    IconShare
} from '@tabler/icons-react';

// Map of icon names to components
const iconMap = {
    eye: IconEye,
    edit: IconEdit,
    trash: IconTrash,
    dots: IconDotsVertical,
    check: IconCheck,
    x: IconX,
    copy: IconCopy,
    download: IconDownload,
    print: IconPrinter,
    share: IconShare,
};

// Get icon component by name
export const getActionIcon = (iconName, props = {}) => {
    const Icon = iconMap[iconName] || IconDotsVertical;
    return <Icon size={16} {...props} />;
};

// Check if action is allowed
export const isActionAllowed = (action, record, config) => {
    const permission = config.permissions?.[action];
    if (!permission) return true;
    return typeof permission === 'function' ? permission(record) : true;
};

// Get action button props
export const getActionButtonProps = (action, config) => {
    const actionConfig = config.buttons?.actions?.[action] || {};
    const defaults = config.buttons?.defaults || {};

    return {
        size: actionConfig.size || defaults.size || 'sm',
        variant: actionConfig.variant || defaults.variant || 'subtle',
        color: actionConfig.color || 'gray',
        radius: actionConfig.radius || defaults.radius || 'sm',
        title: actionConfig.title || action,
        'aria-label': actionConfig.ariaLabel || actionConfig.title || action,
        style: {
            ...config.style?.hover,
            ...(actionConfig.style || {}),
        },
    };
};

// Get action group props
export const getActionGroupProps = (config) => {
    const groupConfig = config.buttons?.group || {};

    return {
        gap: groupConfig.gap || 4,
        wrap: groupConfig.wrap || 'nowrap',
        justify: groupConfig.justify || 'right',
    };
};

// Create action button
export const createActionButton = (
    action, 
    record, 
    config, 
    onClick,
    disabled = false,
    loading = false
) => {
    const actionConfig = config.buttons?.actions?.[action] || {};
    const buttonProps = getActionButtonProps(action, config);
    const Icon = iconMap[actionConfig.icon] || IconDotsVertical;

    const button = (
        <ActionIcon
            {...buttonProps}
            onClick={(e) => {
                // Stop event propagation to prevent row click
                e.stopPropagation();
                if (onClick) onClick(action, record, e);
            }}
            disabled={disabled || loading}
            data-loading={loading}
            style={{
                ...buttonProps.style,
                ...(disabled ? config.style?.disabled : {}),
                ...(loading ? config.style?.loading : {}),
            }}
        >
            <Icon size={16} />
        </ActionIcon>
    );

    // Add tooltip if enabled
    if (config.tooltips?.enabled && buttonProps.title) {
        return (
            <Tooltip
                label={buttonProps.title}
                {...config.tooltips?.props}
            >
                {button}
            </Tooltip>
        );
    }

    return button;
};

// Create action cell content
export const createActionCell = (
    record, 
    config, 
    handlers = {},
    state = { disabled: {}, loading: {} }
) => {
    const allowedActions = Object.keys(config.buttons?.actions || {})
        .filter(action => isActionAllowed(action, record, config));

    if (allowedActions.length === 0) return null;

    const groupProps = getActionGroupProps(config);

    return (
        <Group {...groupProps}>
            {allowedActions.map(action => (
                createActionButton(
                    action,
                    record,
                    config,
                    handlers.onClick,
                    state.disabled[action],
                    state.loading[action]
                )
            ))}
        </Group>
    );
};

// Get action column definition
export const getActionColumn = (config, handlers, state) => {
    if (!config.enabled) return null;

    return {
        accessor: config.column?.accessor || 'actions',
        title: config.column?.title || 'Actions',
        textAlign: config.column?.textAlign || 'right',
        width: config.column?.width || '0%',
        sortable: false,
        render: (record) => createActionCell(record, config, handlers, state),
        style: config.column?.style,
    };
};

// Handle action confirmation
export const handleActionConfirmation = (action, record, config) => {
    const actionConfig = config.buttons?.actions?.[action] || {};
    
    if (!config.confirmation?.enabled) return true;
    
    const message = actionConfig.confirmationMessage || 
        config.confirmation?.messages?.[action] ||
        'Are you sure you want to perform this action?';

    return window.confirm(message);
};
