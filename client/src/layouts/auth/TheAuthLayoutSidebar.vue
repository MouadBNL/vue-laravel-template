<template>
    <div>
        <n-menu
            :options="getMenu(menuOptions)"
        />
    </div>
</template>

<script setup lang="ts">
import { useAuthStore } from '@/store/useAuthStore';
import { NMenu } from 'naive-ui'
import { h, resolveComponent } from 'vue';

const authStore = useAuthStore()

const menuOptions = [
    {
        label: () => h(
            resolveComponent('router-link') as any,
            {
                to: {
                    name: 'auth.about'
                }
            },
            { default: () => 'À propos'}
        ),
        key: 'about',
    }
]

const getMenu = (menu: any[]) => {
    return menu.filter((item) => {
        if(! ('roles' in item)) return true
        else if(Array.isArray(item.roles)){
            return item.roles.includes(authStore.role as string)
        }
        else return true
    })
} 
</script>