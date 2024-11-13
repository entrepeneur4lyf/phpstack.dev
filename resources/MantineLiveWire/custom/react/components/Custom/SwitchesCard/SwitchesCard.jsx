import React from 'react';
import { Card, Text, Group, Switch, Stack } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function SwitchesCard() {
  const { preferences } = useComponent();

  const items = preferences.map((item) => (
    <Group key={item.title} justify="space-between" className="w-full">
      <Stack gap={0}>
        <Text fw={500}>{item.title}</Text>
        <Text fz="xs" c="dimmed">
          {item.description}
        </Text>
      </Stack>
      <Switch defaultChecked={item.active} />
    </Group>
  ));

  return (
    <Card withBorder radius="md" p="xl" className="max-w-[400px]">
      <Text fz="lg" className="mb-1" fw={500}>
        Configure notifications
      </Text>
      <Text fz="sm" c="dimmed" className="mb-5">
        Choose what notifications you want to receive
      </Text>
      <Stack gap="md">
        {items}
      </Stack>
    </Card>
  );
}
