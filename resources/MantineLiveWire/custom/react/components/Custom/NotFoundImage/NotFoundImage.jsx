import React from 'react';
import { Title, Text, Button, Container, Group } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function NotFoundImage() {
  const { error } = useComponent();

  return (
    <Container className="py-16">
      <div className="text-center">
        <img 
          src={error.image} 
          alt="404" 
          className="max-w-[400px] mx-auto mb-8"
        />

        <Title className="font-bold text-4xl">
          {error.title}
        </Title>
        
        <Text c="dimmed" size="lg" className="max-w-[500px] mx-auto mt-4">
          {error.description}
        </Text>
        
        <Group justify="center" mt="xl">
          <Button 
            size="md" 
            variant="filled"
            className="bg-blue-600 hover:bg-blue-700"
          >
            {error.action}
          </Button>
        </Group>
      </div>
    </Container>
  );
}
