import React, { useEffect } from 'react';
import { notifications } from '@mantine/notifications';
import {
  IconCheck,
  IconX,
  IconInfoCircle,
  IconAlertTriangle,
} from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

const icons = {
  success: IconCheck,
  error: IconX,
  info: IconInfoCircle,
  warning: IconAlertTriangle,
};

const colors = {
  success: 'green',
  error: 'red',
  info: 'blue',
  warning: 'yellow',
};

export default function Toast() {
  const { toast } = useComponent();

  useEffect(() => {
    if (toast.show) {
      const Icon = icons[toast.type] || icons.info;
      
      notifications.show({
        title: toast.title,
        message: toast.message,
        icon: <Icon size="1.1rem" />,
        color: colors[toast.type] || colors.info,
        autoClose: toast.timeout || 4000,
        withCloseButton: true,
        withBorder: true,
        className: 'my-notification-class',
        styles: (theme) => ({
          root: {
            backgroundColor: theme.colorScheme === 'dark' ? theme.colors.dark[6] : theme.white,
            borderColor: theme.colorScheme === 'dark' ? theme.colors.dark[4] : theme.colors.gray[3],
          },
          title: {
            color: theme.colorScheme === 'dark' ? theme.white : theme.colors.dark[9],
            fontWeight: 600,
          },
          description: {
            color: theme.colorScheme === 'dark' ? theme.colors.dark[0] : theme.colors.gray[7],
          },
          closeButton: {
            color: theme.colorScheme === 'dark' ? theme.colors.dark[0] : theme.colors.gray[7],
            '&:hover': {
              backgroundColor: theme.colorScheme === 'dark' ? theme.colors.dark[7] : theme.colors.gray[0],
            },
          },
        }),
      });
    }
  }, [toast]);

  return null; // This is a utility component, no UI needed
}
