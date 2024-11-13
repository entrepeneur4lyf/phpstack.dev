import React from 'react';
import {
  Title,
  Text,
  Card,
  SimpleGrid,
  Container,
  ThemeIcon,
  rem,
} from '@mantine/core';
import {
  IconGauge,
  IconCookie,
  IconUser,
  IconMessage2,
  IconLock,
  IconCoin,
} from '@tabler/icons-react';

const icons = {
  'gauge': IconGauge,
  'cookie': IconCookie,
  'user': IconUser,
  'message': IconMessage2,
  'lock': IconLock,
  'coin': IconCoin,
};

import { useComponent } from '@/hooks/useComponent';

export default function FeaturesCards() {
  const { features } = useComponent();

  const cards = features.items.map((feature) => {
    const Icon = icons[feature.icon];

    return (
      <Card key={feature.title} shadow="md" radius="md" className="bg-white dark:bg-gray-800" padding="xl">
        <ThemeIcon
          size={50}
          radius={50}
          variant="light"
          className="bg-blue-50 text-blue-600 dark:bg-blue-900 dark:text-blue-400"
        >
          <Icon style={{ width: rem(26), height: rem(26) }} stroke={1.5} />
        </ThemeIcon>
        <Text mt="md" size="lg" fw={500}>
          {feature.title}
        </Text>
        <Text mt="sm" size="sm" c="dimmed">
          {feature.description}
        </Text>
      </Card>
    );
  });

  return (
    <Container size="lg" py="xl">
      <Title order={2} className="text-center mb-12 font-bold">
        {features.title}
      </Title>

      <SimpleGrid cols={{ base: 1, md: 3 }} spacing="xl" mt={50}>
        {cards}
      </SimpleGrid>
    </Container>
  );
}
