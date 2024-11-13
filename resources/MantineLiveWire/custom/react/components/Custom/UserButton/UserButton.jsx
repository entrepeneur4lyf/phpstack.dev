import React from 'react';
import { UnstyledButton, Group, Avatar, Text } from '@mantine/core';
import { IconChevronRight } from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function UserButton() {
  const { user } = useComponent();

  return (
    <UnstyledButton className="w-full p-4 hover:bg-gray-100 dark:hover:bg-gray-800">
      <Group>
        <Avatar src={user.avatar} radius="xl" />

        <div className="flex-1">
          <Text size="sm" fw={500}>
            {user.name}
          </Text>

          <Text c="dimmed" size="xs">
            {user.email}
          </Text>
        </div>

        <IconChevronRight size={16} />
      </Group>
    </UnstyledButton>
  );
}
