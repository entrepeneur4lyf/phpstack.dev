import React from 'react';
import { Card, Avatar, Text, Group, Button, Stack } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function UserCardImage() {
  const { user } = useComponent();

  return (
    <Card withBorder padding="xl" radius="md" className="max-w-[320px]">
      <Card.Section className="h-36 bg-cover bg-center" style={{ backgroundImage: `url(${user.backgroundImage})` }} />
      
      <Avatar
        src={user.avatar}
        size={80}
        radius={80}
        mt={-30}
        className="mx-auto border-4 border-white dark:border-gray-900"
      />

      <Text ta="center" fw={500} size="lg" mt="sm">
        {user.name}
      </Text>

      <Text ta="center" size="sm" c="dimmed">
        {user.job}
      </Text>

      <Group mt="md" justify="center" gap={30}>
        <Stack gap={0} align="center">
          <Text fw={500}>{user.stats.followers}K</Text>
          <Text size="sm" c="dimmed">Followers</Text>
        </Stack>
        <Stack gap={0} align="center">
          <Text fw={500}>{user.stats.follows}</Text>
          <Text size="sm" c="dimmed">Follows</Text>
        </Stack>
        <Stack gap={0} align="center">
          <Text fw={500}>{user.stats.posts}K</Text>
          <Text size="sm" c="dimmed">Posts</Text>
        </Stack>
      </Group>

      <Button
        fullWidth
        radius="md"
        mt="xl"
        size="md"
        variant="default"
        onClick={() => console.log('Follow clicked')}
      >
        Follow
      </Button>
    </Card>
  );
}
