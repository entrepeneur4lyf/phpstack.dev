import { Badge, Text } from '@mantine/core';
import { format } from 'date-fns';

export const ColorSchemeBadge = ({ value }) => {
    const colorMap = {
        light: 'blue',
        dark: 'dark',
        auto: 'gray',
    };

    return (
        <Badge 
            color={colorMap[value] || 'gray'} 
            variant="light"
            radius="sm"
        >
            {value}
        </Badge>
    );
};

export const DateTime = ({ value }) => {
    if (!value) return null;

    try {
        const date = new Date(value);
        return (
            <Text size="sm" color="dimmed">
                {format(date, 'MMM d, yyyy HH:mm')}
            </Text>
        );
    } catch (error) {
        console.warn('Invalid date:', value);
        return null;
    }
};
