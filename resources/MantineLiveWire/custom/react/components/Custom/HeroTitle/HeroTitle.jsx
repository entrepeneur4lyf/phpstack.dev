import React from 'react';
import { Container, Title, Text, Button, Group } from '@mantine/core';
import { IconBrandGithub } from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function HeroTitle() {
  const { hero } = useComponent();

  return (
    <div className="min-h-screen bg-gray-50 dark:bg-gray-900">
      <Container size="md" className="h-full">
        <div className="h-full flex flex-col justify-center items-center text-center py-16">
          <Title className="text-4xl lg:text-6xl font-bold leading-tight max-w-[800px] bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            {hero.title}
          </Title>

          <Text c="dimmed" mt="md" size="lg" className="max-w-[600px]">
            {hero.description}
          </Text>

          <Group mt={30}>
            <Button size="lg" className="bg-blue-600 hover:bg-blue-700">
              {hero.primaryAction}
            </Button>
            <Button 
              component="a" 
              href={hero.githubUrl}
              target="_blank"
              size="lg" 
              variant="default"
              leftSection={<IconBrandGithub size={20} />}
            >
              GitHub
            </Button>
          </Group>
        </div>
      </Container>
    </div>
  );
}
