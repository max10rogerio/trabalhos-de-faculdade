package br.edu.unifcv.Aula110219.service;


import java.util.ArrayList;
import java.util.List;

import org.springframework.stereotype.Service;
import org.springframework.web.bind.annotation.PathVariable;

import br.edu.unifcv.Aula110219.model.Professor;

@Service
public class ProfessorService {
	private List<Professor> profList = new ArrayList<Professor>();

	public ProfessorService() {
		Professor prof = new Professor();
		prof.setId(1);
		prof.setNome("Professor Teste 1");
		prof.setTelefone("123456789");

		Professor prof2 = new Professor();
		prof2.setId(2);
		prof2.setNome("Professor Teste 2");
		prof2.setTelefone("987654321");

		profList.add(prof);
		profList.add(prof2);
	}

	public List<Professor> getProfessores() {
		return profList;
	}

	public Professor getProfessor(Integer id) {
		return getProfessorById(id);
	}

	public Professor insertProfessor(Professor p) {
		p.setId(profList.size() + 1);
		profList.add(p);
		return p;
	}

	public Professor updateProfessor(Integer id, Professor professor) {
		Professor p = getProfessorById(id);
		p.setNome(professor.getNome());
		p.setTelefone(professor.getTelefone());
		profList.remove(p);
		profList.add(p);
		return p;
	}

	public void deletarProfessor(@PathVariable("@id") Integer id) {
		Professor p = getProfessorById(id);
		profList.remove(p);
	}

	private Professor getProfessorById(Integer id) {
		return profList.stream().filter(professor -> professor.getId().equals(id)).findAny().orElse(null);
	}
}
