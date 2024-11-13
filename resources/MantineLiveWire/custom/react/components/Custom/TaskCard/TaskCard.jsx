import React from 'react';
import { Card, Text, Progress, Badge, Group, Stack, Avatar, AvatarGroup } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function TaskCard() {
  const { task } = useComponent();

  const completionPercentage = Math.round((task.completedTasks / task.totalTasks) * 100);

  return (
    <Card withBorder radius="md" p="xl" className="max-w-[400px]">
      <Card.Section className="p-4 border-b border-gray-200 dark:border-gray-800">
        <Group justify="space-between" wrap="nowrap">
          <Text fz="sm" fw={500} c="dimmed">
            {task.daysLeft} days left
          </Text>
          <Badge size="sm">{task.version}</Badge>
        </Group>
      </Card.Section>

      <Stack mt="md">
        <Text fz="lg" fw={500}>
          {task.title}
        </Text>

        <Text fz="sm" c="dimmed">
          {task.description}
        </Text>

        <Group justify="space-between" mt="md">
          <Text fz="sm">
            Tasks completed:{' '}
            <Text span fw={500}>
              {task.completedTasks}/{task.totalTasks}
            </Text>
          </Text>

          <AvatarGroup>
            {task.team.map((member) => (
              <Avatar key={member.id} src={member.avatar} radius="xl" />
            ))}
            {task.additionalMembers > 0 && (
              <Avatar radius="xl">+{task.additionalMembers}</Avatar>
            )}
          </AvatarGroup>
        </Group>

        <Progress value={completionPercentage} mt={5} size="sm" radius="xs" />
      </Stack>
    </Card>
  );
}
