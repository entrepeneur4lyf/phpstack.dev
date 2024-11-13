import React from 'react';
import { Avatar, Text, Group, Paper, Stack } from '@mantine/core';
import { IconMail, IconCash } from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function UsersStack() {
  const { users } = useComponent();

  const items = users.map((user) => (
    <Paper key={user.id} withBorder p="md">
      <Group wrap="nowrap">
        <Avatar src={user.avatar} size={94} radius="md" />
        <div>
          <Text fz="lg" fw={500}>
            {user.name}
          </Text>

          <Text fz="xs" tt="uppercase" fw={700} c="dimmed">
            {user.role}
          </Text>

          <Group wrap="nowrap" gap={10} mt={5}>
            <IconMail stroke={1.5} size={16} className="text-gray-500" />
            <Text fz="xs" c="dimmed">
              {user.email}
            </Text>
          </Group>

          <Group wrap="nowrap" gap={10} mt={5}>
            <IconCash stroke={1.5} size={16} className="text-gray-500" />
            <Text fz="xs" c="dimmed">
              {user.rate}
            </Text>
          </Group>
        </div>
      </Group>
    </Paper>
  ));

  return (
    <Stack>
      {items}
    </Stack>
  );
}
