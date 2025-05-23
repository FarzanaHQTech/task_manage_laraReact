import {Head} from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import { Card ,CardContent,CardHeader,CardTitle } from '@/components/ui/card';
import { Plus,Pencil,Trash2,CheckCircle2,XCircle } from 'lucide-react';
import { Link } from '@inertiajs/react';
import appLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { useState,useEffect } from 'react';
import { Dialog,DialogContent,DialogHeader,DialogTitle,DialogTrigger } from '@/components/ui/dialog';
import {Input} from '@/components/ui/input'
import { Label } from '@/components/ui/label';
import { Textarea } from '@headlessui/react';
import {useForm} from '@inertiajs/react';

interface List{
    id: number;
    title:string,
    description:string|null;
    task_count:number;
}
interface Props{
    lists: List[];
    flash?:{
        success?:string;
        error?:string;
    };
}
const breadcrumbs: BreadcrumbItem[]=
[{
    title:'Lists',
    href:'/lists'
}];
