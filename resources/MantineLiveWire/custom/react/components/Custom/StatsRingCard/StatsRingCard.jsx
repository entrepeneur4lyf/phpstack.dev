import React from 'react';
import { Card, RingProgress, Group, Text, Stack } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function StatsRingCard() {
  const { stats } = useComponent();

  const completed = stats.completed;
  const total = stats.total;
  const percentage = Math.round((completed / total) * 100);

  return (
    <Card withBorder p="xl" radius="md" className="max-w-[400px]">
      <div className="flex justify-between mb-8">
        <Stack gap={0}>
          <Text fz="sm" c="dimmed">
            Project tasks
          </Text>
          <Text fw={700} fz="xl">
            {total}
          </Text>
        </Stack>

        <RingProgress
          size={80}
          roundCaps
          thickness={8}
          sections={[{ value: percentage, color: 'blue' }]}
          label={
            <Text size="xs" ta="center" px="xs">
              {percentage}%
            </Text>
          }
        />
      </div>

      <Group justify="space-between">
        <Stack gap={0}>
          <Text fz="sm" c="dimmed">
            Completed
          </Text>
          <Text fw={700} fz="xl">
            {completed}
          </Text>
        </Stack>

        <Stack gap={0}>
          <Text fz="sm" c="dimmed">
            In progress
          </Text>
          <Text fw={700} fz="xl">
            {stats.inProgress}
          </Text>
        </Stack>

        <Stack gap={0}>
          <Text fz="sm" c="dimmed">
            Remaining
          </Text>
          <Text fw={700} fz="xl">
            {total - completed - stats.inProgress}
          </Text>
        </Stack>
      </Group>
    </Card>
  );
}
