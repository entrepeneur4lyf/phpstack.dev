import React from 'react';
import { Group, Avatar, Text, Stack } from '@mantine/core';
import { IconPhoneCall, IconAt, IconBriefcase } from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function UserInfoIcons() {
  const { user } = useComponent();

  return (
    <div className="p-4 border border-gray-200 dark:border-gray-800 rounded-lg">
      <Group wrap="nowrap">
        <Avatar src={user.avatar} size={94} radius="md" />
        <div>
          <Text fz="xs" tt="uppercase" fw={700} c="dimmed">
            {user.role}
          </Text>

          <Text fz="lg" fw={500} className="mt-1">
            {user.name}
          </Text>

          <Stack gap={4} mt={5}>
            <Group wrap="nowrap" gap={10}>
              <IconAt stroke={1.5} size={16} className="text-gray-500" />
              <Text fz="xs" c="dimmed">
                {user.email}
              </Text>
            </Group>

            <Group wrap="nowrap" gap={10}>
              <IconPhoneCall stroke={1.5} size={16} className="text-gray-500" />
              <Text fz="xs" c="dimmed">
                {user.phone}
              </Text>
            </Group>

            <Group wrap="nowrap" gap={10}>
              <IconBriefcase stroke={1.5} size={16} className="text-gray-500" />
              <Text fz="xs" c="dimmed">
                {user.role}
              </Text>
            </Group>
          </Stack>
        </div>
      </Group>
    </div>
  );
}
