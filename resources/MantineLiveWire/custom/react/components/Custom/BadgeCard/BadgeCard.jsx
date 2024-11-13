import React from 'react';
import { Card, Image, Text, Group, Badge, Button, Stack } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function BadgeCard() {
  const { card } = useComponent();

  const features = card.features.map((feature) => (
    <Badge key={feature} variant="light">
      {feature}
    </Badge>
  ));

  return (
    <Card withBorder radius="md" p="md" className="max-w-[350px]">
      <Card.Section>
        <Image src={card.image} alt={card.title} height={180} />
      </Card.Section>

      <Card.Section className="p-4 border-b border-gray-200 dark:border-gray-800">
        <Group justify="apart">
          <Text fw={500}>{card.title}</Text>
          <Badge variant="light">
            {card.country}
          </Badge>
        </Group>
        <Text fz="sm" mt="xs">
          {card.description}
        </Text>
      </Card.Section>

      <Card.Section className="p-4">
        <Text fz="sm" c="dimmed" className="mb-3">
          Perfect for you, if you enjoy
        </Text>
        <Group gap={7} mt={5}>
          {features}
        </Group>
      </Card.Section>

      <Stack mt="md">
        <Button radius="md" style={{ flex: 1 }}>
          Show details
        </Button>
      </Stack>
    </Card>
  );
}
