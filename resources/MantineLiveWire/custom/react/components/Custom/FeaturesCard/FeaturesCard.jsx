import React from 'react';
import { Card, Image, Text, Group, Badge, Button, Stack } from '@mantine/core';
import { IconGasStation, IconGauge, IconManualGearbox, IconUsers } from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

const icons = {
  'gas-station': IconGasStation,
  'gauge': IconGauge,
  'manual-gearbox': IconManualGearbox,
  'users': IconUsers,
};

export default function FeaturesCard() {
  const { card } = useComponent();

  const features = card.features.map((feature) => {
    const Icon = icons[feature.icon];
    return (
      <Group key={feature.label} gap={10} className="mb-3">
        <Icon size={20} stroke={1.5} className="text-gray-600 dark:text-gray-400" />
        <Text fz="sm">{feature.label}</Text>
      </Group>
    );
  });

  return (
    <Card withBorder radius="md" className="max-w-[350px]">
      <Card.Section className="relative">
        <Image src={card.image} alt={card.title} height={180} />
        <Badge className="absolute top-2 right-2" variant="filled">
          {card.badge}
        </Badge>
      </Card.Section>

      <Stack mt="md">
        <Text fw={500}>{card.title}</Text>
        <Text fz="sm" c="dimmed">
          {card.description}
        </Text>
      </Stack>

      <Stack mt={20}>
        {features}
      </Stack>

      <Card.Section className="p-4 border-t border-gray-200 dark:border-gray-800">
        <Group justify="apart">
          <Stack gap={4}>
            <Text fz="xl" fw={700}>
              {card.price}
            </Text>
            <Text fz="sm" c="dimmed">
              {card.period}
            </Text>
          </Stack>
          <Button radius="md">
            {card.actionLabel}
          </Button>
        </Group>
      </Card.Section>
    </Card>
  );
}
