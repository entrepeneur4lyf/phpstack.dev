import React from 'react';
import { Menu, Group, Text, Avatar } from '@mantine/core';
import { IconChevronDown, IconHeart, IconStar, IconMessage, IconSettings, IconSwitchHorizontal, IconLogout } from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function UserMenu() {
  const { user } = useComponent();

  return (
    <Menu shadow="md" width={200}>
      <Menu.Target>
        <Group gap={7} className="px-3 py-2 border border-gray-200 dark:border-gray-800 rounded-md cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800">
          <Avatar src={user.avatar} alt={user.name} radius="xl" size={20} />
          <Text fw={500} size="sm">
            {user.name}
          </Text>
          <IconChevronDown size={12} stroke={1.5} />
        </Group>
      </Menu.Target>

      <Menu.Dropdown>
        <Menu.Item leftSection={<IconHeart size={14} stroke={1.5} />}>
          Liked posts
        </Menu.Item>
        <Menu.Item leftSection={<IconStar size={14} stroke={1.5} />}>
          Saved posts
        </Menu.Item>
        <Menu.Item leftSection={<IconMessage size={14} stroke={1.5} />}>
          Your comments
        </Menu.Item>

        <Menu.Divider />

        <Menu.Item leftSection={<IconSettings size={14} stroke={1.5} />}>
          Account settings
        </Menu.Item>
        <Menu.Item leftSection={<IconSwitchHorizontal size={14} stroke={1.5} />}>
          Change account
        </Menu.Item>
        <Menu.Item leftSection={<IconLogout size={14} stroke={1.5} />} color="red">
          Logout
        </Menu.Item>
      </Menu.Dropdown>
    </Menu>
  );
}
