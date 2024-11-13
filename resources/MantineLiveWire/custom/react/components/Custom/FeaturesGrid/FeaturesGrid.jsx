import React from 'react';
import {
  Title,
  SimpleGrid,
  Text,
  ThemeIcon,
  Container,
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

export default function FeaturesGrid() {
  const { features } = useComponent();

  const items = features.items.map((feature) => {
    const Icon = icons[feature.icon];

    return (
      <div key={feature.title}>
        <ThemeIcon
          size={40}
          radius={40}
          variant="light"
          className="bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200"
        >
          <Icon style={{ width: rem(20), height: rem(20) }} stroke={1.5} />
        </ThemeIcon>
        <Text mt="sm" mb={7} fw={500}>
          {feature.title}
        </Text>
        <Text size="sm" c="dimmed" lh={1.6}>
          {feature.description}
        </Text>
      </div>
    );
  });

  return (
    <Container size="lg" py="xl">
      <Title order={2} className="text-center mb-12 font-bold">
        {features.title}
      </Title>

      <SimpleGrid
        cols={{ base: 1, md: 3 }}
        spacing={{ base: 'xl', md: 50 }}
        verticalSpacing={{ base: 'xl', md: 50 }}
      >
        {items}
      </SimpleGrid>
    </Container>
  );
}
