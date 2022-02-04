<?php

namespace App\Services;

use App\Repositories\{
    CourseRepository, 
    ModuleRepository
};

class ModuleService
{
    protected $moduleRepository;
    protected $courseRepository;

    public function __construct(
        ModuleRepository $moduleRepository,
        CourseRepository $courseRepository
    ) {
        $this->moduleRepository = $moduleRepository;
        $this->courseRepository = $courseRepository;
    }

    public function getModulesByCurses(string $course)
    {
        $course = $this->getCourse($course);

        return $this->moduleRepository->getModuleByCourses($course->id);
    }

    public function createNewModule(array $data)
    {
        $course = $this->getCourse($data['course']);

        return $this->moduleRepository->createNewModule($course->id, $data);
    }

    public function getModuleByCourse(string $course, string $identify)
    {
        $course = $this->getCourse($course);

        return $this->moduleRepository->getModuleByCourse($course->id, $identify);
    }

    public function updateModule(string $identify, array $data)
    {
        $course = $this->getCourse($data['course']);

        return $this->moduleRepository->updateModuleByUuid($course->id, $identify, $data);
    }

    public function deleteModule(string $course, string $identify)
    {
        return $this->moduleRepository->deleteModuleByUuid($identify);
    }

    public function getCourse(string $course)
    {
        return $this->courseRepository->getCourseByUuid($course);
    }
}
