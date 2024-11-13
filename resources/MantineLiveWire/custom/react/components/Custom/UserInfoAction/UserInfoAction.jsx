import React from 'react';
import { Group, Avatar, Text, Button } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function UserInfoAction() {
  const { user } = useComponent();

  return (
    <div className="p-4 border border-gray-200 dark:border-gray-800 rounded-lg">
      <Group wrap="nowrap">
        <Avatar
          src={user.avatar}
          size={94}
          radius="md"
        />
        <div>
          <Text fz="xs" tt="uppercase" fw={700} c="dimmed">
            {user.title}
          </Text>

          <Text fz="lg" fw={500} className="mt-1">
            {user.name}
          </Text>

          <Group wrap="nowrap" gap={10} mt={3}>
            <Text fz="xs" c="dimmed">
              {user.email} • {user.role}
            </Text>
          </Group>

          <Group wrap="nowrap" gap={10} mt={5}>
            <Button size="sm" variant="default">
              {user.actionLabel}
            </Button>
          </Group>
        </div>
      </Group>
    </div>
  );
}
