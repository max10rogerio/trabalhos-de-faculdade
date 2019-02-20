package br.edu.unifcv.Aula110219.controller;

import java.util.List;

import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import br.edu.unifcv.Aula110219.model.Professor;
import br.edu.unifcv.Aula110219.service.ProfessorService;

@RestController
@RequestMapping(path = "/professor")
public class ProfessorController {
//	@Autowired
	private ProfessorService professorService;
	
	public ProfessorController(ProfessorService professorService) {
		this.professorService = professorService;
	}
	
	@RequestMapping
	public List<Professor> getProfessores() {
		return professorService.getProfessores();
	}
	
	@RequestMapping(path = "/{id}")
	public Professor getProfessor(@PathVariable("id") Integer id) {
		return professorService.getProfessor(id);
	}
	
	@RequestMapping(path = "/salvar", method = RequestMethod.POST)
	public Professor saveProfessor(@RequestBody Professor professor) {
		return professorService.insertProfessor(professor);
	}
	
	@RequestMapping(path = "/{id}/update", method = RequestMethod.PUT)
	public Professor updateProfessor(@PathVariable("id") Integer id, @RequestBody Professor professor) {
		return professorService.updateProfessor(id, professor);
	}
	
	@RequestMapping(path = "/{id}", method = RequestMethod.DELETE)
	public void deleteProfessor(@PathVariable("id") Integer id) {
		professorService.deletarProfessor(id);
	}
}
