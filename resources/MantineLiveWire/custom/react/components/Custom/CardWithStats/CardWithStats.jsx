import React from 'react';
import { Card, Image, Text, Group, RingProgress, Stack } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function CardWithStats() {
  const { card } = useComponent();

  return (
    <Card withBorder radius="md" p="md" className="max-w-[400px]">
      <Card.Section>
        <Image src={card.image} alt={card.title} height={180} />
      </Card.Section>

      <Card.Section className="p-4 border-b border-gray-200 dark:border-gray-800">
        <Group justify="apart">
          <Text fw={500}>{card.title}</Text>
          <Text fz="sm" c="dimmed">
            {card.completionText}
          </Text>
        </Group>
        <Text fz="sm" mt="xs" c="dimmed">
          {card.stats}
        </Text>
      </Card.Section>

      <Card.Section className="p-4">
        <Group>
          {card.metrics.map((metric) => (
            <Stack key={metric.label} gap={5} align="center">
              <Text fz="sm" c="dimmed">
                {metric.label}
              </Text>
              {metric.progress ? (
                <RingProgress
                  size={80}
                  roundCaps
                  thickness={8}
                  sections={[{ value: metric.value, color: 'blue' }]}
                  label={
                    <Text size="xs" ta="center" px="xs">
                      {metric.value}%
                    </Text>
                  }
                />
              ) : (
                <Text fw={500}>{metric.value}</Text>
              )}
            </Stack>
          ))}
        </Group>
      </Card.Section>
    </Card>
  );
}
